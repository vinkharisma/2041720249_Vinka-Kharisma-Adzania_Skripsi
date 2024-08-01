from flask import Flask, request, jsonify
import numpy as np
from scipy import stats
import pmdarima as pm

app = Flask(__name__)

def inv_boxcox(y, lambda_):
    if lambda_ == 0:
        return np.exp(y)
    else:
        return (y * lambda_ + 1) ** (1 / lambda_)

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
    stok_akhir_transformed, lam = stats.boxcox(stok_akhir + 1)
    
    # Fit model ARIMA
    model = pm.ARIMA(order=(0, 2, 1))
    model.fit(stok_akhir_transformed)
    forecast_transformed, conf_int_transformed = model.predict(n_periods=10, return_conf_int=True)
    
    # Invers Transformasi Box-Cox
    forecast = inv_boxcox(forecast_transformed, lam)
    
    # Dummy data for actual values for MAPE calculation
    if len(stok_akhir) >= 10:
        actual = stok_akhir[-10:]  # Menggunakan 10 data terakhir sebagai actual (dummy)
    else:
        actual = stok_akhir  # Gunakan seluruh data jika kurang dari 10
    
    # Hitung MAPE
    forecast_length = len(forecast)
    if len(actual) < forecast_length:
        actual = np.pad(actual, (0, forecast_length - len(actual)), 'mean')
    mape = np.mean(np.abs((actual[-forecast_length:] - forecast) / actual[-forecast_length:])) * 100
    
    response = {
        'forecast': forecast.tolist(),
        'conf_int': conf_int_transformed.tolist(),
        'mape': mape
    }
    
    return jsonify(response)

if __name__ == '__main__':
    app.run(debug=True)
