<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Array de números aleatorios:</h3>
<div id="tabla"></div>

<p>Máximo: <span id="maximo"></span></p>
<p>Mínimo: <span id="minimo"></span></p>
<p>Más repetido: <span id="masRepetido"></span></p>

<script>
    function generarArray() {
        let arr = [];
        for (let i = 0; i < 20; i++) {
            arr[i] = Math.floor(Math.random() * 10) + 1;
        }
        return arr;
    }

    function maximo(arr) {
        let max = arr[0];
        for (let i = 1; i < arr.length; i++) {
            if (arr[i] > max) {
                max = arr[i];
            }
        }
        return max;
    }

    function minimo(arr) {
        let min = arr[0];
        for (let i = 1; i < arr.length; i++) {
            if (arr[i] < min) {
                min = arr[i];
            }
        }
        return min;
    }

    function masRepetido(arr) {
        let contador = {};
        let valor = arr[0];
        let maxRepeticiones = 1;

        for (let i = 0; i < arr.length; i++) {
            let num = arr[i];
            if (contador[num]) {
                contador[num]++;
            } else {
                contador[num] = 1;
            }

            if (contador[num] > maxRepeticiones) {
                maxRepeticiones = contador[num];
                valor = num;
            }
        }

        return valor;
    }

    function mostrarTabla(arr) {
        let html = "<table border='1'><tr>";
        for (let i = 0; i < arr.length; i++) {
            html += "<td>" + arr[i] + "</td>";
        }
        html += "</tr></table>";
        document.getElementById("tabla").innerHTML = html;
    }

    let numeros = generarArray();
    mostrarTabla(numeros);
    document.getElementById("maximo").textContent = maximo(numeros);
    document.getElementById("minimo").textContent = minimo(numeros);
    document.getElementById("masRepetido").textContent = masRepetido(numeros);
    </script>
</body>
</html>