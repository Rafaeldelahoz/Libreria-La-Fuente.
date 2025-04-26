from selenium import webdriver
from selenium.webdriver.common.by import By
import time

driver = webdriver.Chrome()
driver.maximize_window()

# Ir a la página de inicio de sesión
driver.get("http://localhost/proyectos/libreria-la-fuente/index/index.php")  # Ajusta la ruta

time.sleep(2)

# Ingresar usuario y contraseña válidos
driver.find_element(By.NAME, "usuario").send_keys("admin")
driver.find_element(By.NAME, "password").send_keys("admin")

# Hacer clic en el botón de iniciar sesión
driver.find_element(By.ID, "btn_iniciar_sesion").click()  # Ajusta el ID si es diferente

time.sleep(3)

# Validar que ingresó al dashboard (por ejemplo, buscando un título o texto específico)
assert "Dashboard" in driver.page_source  # Ajusta si tu dashboard tiene otro texto

# Capturar evidencia
driver.save_screenshot("./Testing/captura_inicio_sesion_valido.png")

# Cerrar navegador
driver.quit()
