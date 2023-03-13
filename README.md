# Plugin de calculadora para WordPress

Este es un plugin de calculadora para WordPress realizado para una prueba para la empresa Izertis.

## Instalación

1. Clona o descarga el archivo zip del repositorio a la carpeta deseada.
2. Copia la carpeta `wp-calculator-plugin` en la carpeta `wp-content/plugins` de tu instalación de WordPress.
3. Ejecuta `npm install` para instalar los archivos necesarios.
4. Ejecuta `npm run build` para construir los archivos necesarios.
5. Agrega el shortcode `[calc-plugin]` en la página donde quieras visualizar la calculadora.

## Requisitos
Este plugin necesita PHP 8.1 o superior

## Configuración de la API

Para que la calculadora funcione correctamente, debes configurar la URL de la API en el archivo `src/js/components/Calculator.js`, cambiando el valor de la constante `API_URL`.

## Autor

* **Fabian Armando Espinosa Hernandez** - *Contacto* - 
[Correo electrónico](mailto:fabianespinosa1988@gmail.com) -
[GitHub](https://github.com/FabianEspinosa) -
[LinkedIn](https://www.linkedin.com/in/faehz/)
