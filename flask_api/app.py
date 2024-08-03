from flask import Flask, request, jsonify
import numpy as np
import pandas as pd
from scipy import stats
from scipy.special import inv_boxcox
import pmdarima as pm
import statsmodels.api as sm

app = Flask(__name__)

# Cek versi
import scipy
import pmdarima
import statsmodels
print("Versi scipy di Flask:", scipy.__version__)
print("pmdarima version:", pmdarima.__version__)
print("statsmodels version:", statsmodels.__version__)

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    if 'stok_akhir' not in data or 'dates' not in data:
        return jsonify({"error": "Missing 'stok_akhir' or 'dates' in request"}), 400

    stok_akhir = np.array(data['stok_akhir'])
    dates = np.array(data['dates'])

    if len(stok_akhir) == 0 or len(dates) == 0:
        return jsonify({"error": "Data is empty"}), 400

    # Transformasi Box-Cox
    if np.any(stok_akhir <= 0):
        stok_akhir_positive = stok_akhir[stok_akhir > 0]
        if len(stok_akhir_positive) == 0:
            return jsonify({"error": "No positive values for Box-Cox transformation"}), 400
        stok_akhir_transformed, lmbda = stats.boxcox(stok_akhir_positive)
    else:
        stok_akhir_transformed, lmbda = stats.boxcox(stok_akhir)

    print("Stok Akhir Asli:", stok_akhir)
    print("Stok Akhir Setelah Transformasi Box-Cox:", stok_akhir_transformed)
    print("Lambda untuk Box-Cox:", round(lmbda, 3))

    # Split data into training and testing
    split_index = int(len(stok_akhir) * 0.8)  # 80% untuk pelatihan
    train_data = stok_akhir_transformed[:split_index]
    test_data = stok_akhir_transformed[split_index:]

    # Fit model auto_arima pada data pelatihan
    model = pm.auto_arima(train_data, seasonal=False, stepwise=True)
    print("Ringkasan Model ARIMA:")
    print(model.summary())

    # Prediksi menggunakan model yang sudah dilatih
    forecast_length = len(test_data)  # Jumlah periode untuk prediksi sesuai dengan data pengujian
    forecast_transformed, conf_int_transformed = model.predict(n_periods=forecast_length, return_conf_int=True)
    print("Prediksi Setelah Transformasi:", forecast_transformed)
    print("Interval Kepercayaan (Transformasi):", conf_int_transformed)

    # Invers Transformasi Box-Cox
    forecast = inv_boxcox(forecast_transformed, lmbda)
    test_data_original = inv_boxcox(test_data, lmbda)  # Transformasi balik data pengujian
    print("Prediksi Setelah Invers Transformasi Box-Cox:", forecast)
    print("Data Aktual Setelah Invers Transformasi Box-Cox:", test_data_original)

    # Hitung MAPE
    nonzero_indices = test_data_original != 0
    if np.any(nonzero_indices):
        mape = np.mean(np.abs((test_data_original[nonzero_indices] - forecast[:len(test_data_original[nonzero_indices])]) / test_data_original[nonzero_indices])) * 100
    else:
        mape = np.nan  # Jika semua nilai aktual adalah nol, MAPE tidak bisa dihitung

    print("Data Aktual untuk Perhitungan MAPE:", test_data_original)
    print("MAPE:", mape)

    # Menghasilkan interval kepercayaan yang telah dikembalikan dari transformasi Box-Cox
    lower_ci = inv_boxcox(conf_int_transformed[:, 0], lmbda)
    upper_ci = inv_boxcox(conf_int_transformed[:, 1], lmbda)

    print("Forecast:", forecast)
    print("Lower CI:", lower_ci)
    print("Upper CI:", upper_ci)

    response = {
        'forecast': forecast.tolist(),
        'lower_ci': lower_ci.tolist(),
        'upper_ci': upper_ci.tolist(),
        'mape': mape
    }

    return jsonify(response)

if __name__ == '__main__':
    app.run(debug=True)
