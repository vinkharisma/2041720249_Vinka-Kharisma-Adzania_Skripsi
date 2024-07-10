import sys
import pandas as pd
import numpy as np
from pmdarima.arima import ARIMA
from scipy.special import inv_boxcox, boxcox

# Baca data dari input
data = list(map(float, sys.stdin.read().strip().split()))

# Transformasi Box-Cox
transformed_data, lambda_value = boxcox(data)

# Differencing untuk stasioneritas mean
differenced_data = np.diff(transformed_data, n=2)

# ARIMA (0,2,1)
model = ARIMA(order=(0, 2, 1)).fit(differenced_data)
forecast = model.predict(n_periods=10)

# Integrasi prediksi (cumulative sum)
cumulative_sum = np.cumsum(np.r_[transformed_data[-1], forecast]).tolist()

# Invers transformasi Box-Cox
forecast_inversed = inv_boxcox(cumulative_sum, lambda_value).tolist()

# Print hasil prediksi
print(' '.join(map(str, forecast_inversed)))
