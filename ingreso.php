<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumir API</title>
    
</head>
<body>
    <button onclick="getData()">GET</button>
    <button onclick="postData()">POST</button>
    <button onclick="putData()">PUT</button>
    <button onclick="deleteData()">DELETE</button>
    <div id="result"></div>

    <script>
        const baseUrl = 'http://localhost:3000/carreras';

        function getData() {
            fetch(baseUrl)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerText = JSON.stringify(data, null, 2);
                });
        }

        function postData() {
            const n = parseInt(prompt('Ingrese el valor de n:'));
            const d = parseFloat(prompt('Ingrese el valor de d:'));

            fetch(`${baseUrl}?n=${n}&d=${d}`, { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerText = data.message;
                });
        }

        function putData() {
            const id = parseInt(prompt('Ingrese el ID de la carrera:'));
            const n = parseInt(prompt('Ingrese el nuevo valor de n:'));
            const d = parseFloat(prompt('Ingrese el nuevo valor de d:'));

            fetch(`${baseUrl}/${id}?n=${n}&d=${d}`, { method: 'PUT' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerText = data.message;
                });
        }

        function deleteData() {
            const id = parseInt(prompt('Ingrese el ID de la carrera:'));

            fetch(`${baseUrl}/${id}`, { method: 'DELETE' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerText = data.message;
                });
        }
    </script>
</body>
</html>
