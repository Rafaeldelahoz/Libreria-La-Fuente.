from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time
import os

driver = webdriver.Chrome()
driver.maximize_window()

try:
    # Ir a la página de inicio de sesión
    driver.get("http://localhost/proyectos/libreria-la-fuente/index/index.php")  # Ajusta la ruta

    # Esperar a que la página cargue
    WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.NAME, "usuario")))

    # Ingresar usuario y contraseña válidos
    driver.find_element(By.NAME, "usuario").send_keys("admin")
    driver.find_element(By.NAME, "password").send_keys("admin")

    # Hacer clic en el botón de iniciar sesión
    driver.find_element(By.ID, "btn_iniciar_sesion").click()

    # Validar que carga el dashboard correctamente
    WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.XPATH, "//*[contains(text(), 'Bienvenido, admin') or contains(text(), 'Dashboard')]"))
    )

    # Redirigir a la nueva ruta
    driver.get("http://localhost/proyectos/libreria-la-fuente/users/4.Admin_em.php")

    # Esperar a que la página cargue
    WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.TAG_NAME, "body")))

    # Crear la carpeta para guardar capturas si no existe
    os.makedirs("./Testing", exist_ok=True)

    # Tomar un pantallazo de la página redirigida
    driver.save_screenshot("./Testing/captura_admin_em.png")

    # Cerrar sesión
    logout_button = WebDriverWait(driver, 10).until(
        EC.element_to_be_clickable((By.ID, "btn_cerrar_sesion"))  # Ajusta el ID si es diferente
    )
    logout_button.click()

    # Validar que redirige a la página de inicio de sesión después de cerrar sesión
    WebDriverWait(driver, 10).until(EC.url_contains("index.php"))

finally:
    # Cerrar navegador
    driver.quit()