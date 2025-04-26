from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.alert import Alert
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

driver = webdriver.Chrome()
driver.maximize_window()

driver.get("http://localhost/proyectos/libreria-la-fuente/index/index.php")

time.sleep(2)

driver.find_element(By.NAME, "usuario").send_keys("admin")
driver.find_element(By.NAME, "password").send_keys("incorrecto123")

driver.find_element(By.ID, "btn_iniciar_sesion").click()

WebDriverWait(driver, 10).until(EC.alert_is_present())
alert = Alert(driver)
alert_text = alert.text

assert "acceso denegado,por favor verifique los datos" in alert_text.lower()

# Guardar el texto del alert como evidencia
with open("./Testing/evidencia_alert_login_invalido.txt", "w") as file:
    file.write(f"Mensaje del alert capturado: {alert_text}")

# Aceptar el alert
alert.accept()

# Esperar un momento y tomar captura de pantalla
time.sleep(1)
driver.save_screenshot("./Testing/captura_inicio_sesion_invalido.png")

assert "index.php" in driver.current_url

driver.quit()
