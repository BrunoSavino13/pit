document.getElementById('add-product-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    
    const formData = new FormData(this);

    fetch('server-endpoint', { 
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Sucesso:', data);
        alert('Produto adicionado com sucesso!');
        this.reset(); 
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Ocorreu um erro ao adicionar o produto.');
    });
});

const express = require('express');
const multer = require('multer');
const path = require('path');

const app = express();
const upload = multer({ dest: 'uploads/' });

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.post('/add-product', upload.single('product-image'), (req, res) => {
    
    const productName = req.body['product-name'];
    const productDescription = req.body['product-description'];
    const productPrice = req.body['product-price'];
    const productImage = req.file; 
   

    res.json({ message: 'Produto adicionado com sucesso!' });
});

app.listen(3000, () => {
    console.log('Servidor rodando na porta 3000');
});