jQuery(document).ready(function($){

    searchCotizacion()
    searchCountry()

    $('.btn-add').click(function(e){
        e.preventDefault();
        let product = $('#i-search').val()
        let cant = $('#i-cant').val()

        if (product === ""){
            alert('Equipment model is required.')
            $('#i-search').focus()
        }else{
            if (cant === ""){
                alert('The quantity is required for the calculation of the quotation.')
                $('#i-cant').focus()
            }else{
                if (cant === "0"){
                    alert('Product quantity must be greater than 0.')
                }else{
                    searchProducts(product, cant)
                    $('#i-cant').focus()
                }
            }
        }
    })

    $('.btn-addE').click(function(e){
        e.preventDefault();
        let product = $('#i-searchE').val()
        let cant = $('#i-cantE').val()

        if (product === ""){
            alert('Equipment model is required.')
            $('#i-searchE').focus()
        }else{
            if (cant === ""){
                alert('The quantity is required for the calculation of the quotation.')
                $('#i-cantE').focus()
            }else{
                if (cant === "0"){
                    alert('Product quantity must be greater than 0.')
                }else{
                    searchProductsE(product, cant)
                    $('#i-cantE').focus()
                }
            }
        }
    })

    $(document).on('keyup', '#i-searchCotizacion', function(){
        var valor = $(this).val()
        searchCotizacion(valor)
    })

    $(document).on('click', '.btnc', function(e){
        $('#sres').val("")
        $('#atc').val("")
        $('#subtotal').val("0000.00")
        $('#desc').val("0000.00")
        $('#subtotal2').val("0000.00")
        $('#envio').val("")
        $('#total').val("0000.00")
        $('#count').val("0")
        $('#list-product tr').remove()
        $('#country').val(0)
    })

    $(document).on('click', '.btncE', function(e){
        $('#sresE').val("")
        $('#atcE').val("")
        $('#subtotalE').val("0000.00")
        $('#descE').val("0000.00")
        $('#subtotal2E').val("0000.00")
        $('#envioE').val("")
        $('#totalE').val("0000.00")
        $('#countEdit').val("0")
        $('#count').val("0")
        $('#country').val(0)
        $('#list-productE tr').remove()
    })

    $(document).on('click', '.btn-cancelar', function(e){
        $('#sres').val("")
        $('#atc').val("")
        $('#subtotal').val("0000.00")
        $('#desc').val("0000.00")
        $('#subtotal2').val("0000.00")
        $('#envio').val("")
        $('#total').val("0000.00")
        $('#count').val("0")
        $('#list-product tr').remove()
        $('#country').val(0)
    })

    $(document).on('click', '.btn-cancelarE', function(e){
        $('#sresE').val("")
        $('#atcE').val("")
        $('#subtotalE').val("0000.00")
        $('#descE').val("0000.00")
        $('#subtotal2E').val("0000.00")
        $('#envioE').val("")
        $('#totalE').val("0000.00")
        $('#countEdit').val("0")
        $('#count').val("0")
        $('#country').val(0)
        $('#list-productE tr').remove()
    })

    $(document).on('click', '#view', function(e){
        var valor = $(this).val()
        createdSession(valor)
    })

    $(document).on('click', '#edit', function(e){
        var valor = $(this).val()
        editCotizacion(valor)
        $('#idEdit').val(valor)
    })

    $(document).on('click', '#erased', function(e){
        var valor = $(this).val()
        $('.idDelete').text('QUO'+valor)  
        $('.idDelete').val(valor) 
    })

    $(document).on('click', '#deleteOk', function(e){
        var valor = $('.idDelete').val()
        deleteCotizacion(valor)        
    })

    $(document).on('click', '#btnSaved', function(e){
        e.preventDefault();
        var sres = $('#sres').val()
        var atc = $('#atc').val()
        var subtotal = $('#subtotal').val()
        var desc = $('#desc').val()
        var subtotal2 = $('#subtotal2').val()
        var envio = $('#envio').val()
        var total = $('#total').val()
        var count = $('#count').val()
        var mEnvio = $('#envioM').val()
        var destino = $('#country').val()
        var zipcode = $('#zipcode').val()
        var incoterm = $('#incoterm').val()
        var divisa = $('#divisa').val()
        var pago = $('#pago').val()
        var nItem = parseInt(count) + parseInt(1);
        var url =  $(location).attr('host')+''+$(location).attr('pathname')
        var newUrl = url.replace("wp-admin/admin.php", "")
        let datas = []

        for (let i = 1; i < nItem; i++) {
            let model = $('#i-hidden-'+i+'').val()
            let image = $('#ih-image-'+i+'').val()
            let maker = $('#ih-maker-'+i+'').val()
            let name = $('#name-'+i+'').text()
            let cant = $('#cant-'+i+'').text()
            let precio = $('#precio-'+i+'').text()
            let totalprecio = $('#totalPrecio-'+i+'').text()

            datas.push({
                'model' : model,
                'image' : image,
                'maker' : maker,
                'name' : name,
                'cant' : cant,
                'precio' : precio,
                'totalprecio' : totalprecio
            })
        }  
        
        if (sres === ""){
            $('#sres').focus()
            alert('There are fields that are empty, please provide the requested information.')
        }else{
            if (atc === ""){
                alert('There are fields that are empty, please provide the requested information.')
                $('#atc').focus()
            }else{
                if (mEnvio === "0"){
                    alert('There are fields that are empty, please provide the requested information.')
                    $('#envioM').focus()
                }else{
                    if (destino === "0"){
                        alert('There are fields that are empty, please provide the requested information.')
                        $('#country').focus()
                    }else{
                        if (zipcode === ""){
                            alert('There are fields that are empty, please provide the requested information.')
                            $('#country').focus()
                        }else{
                            if (incoterm === "0"){
                                alert('There are fields that are empty, please provide the requested information.')
                                $('#incoterm').focus()
                            }else{
                                if (divisa === "0"){
                                    alert('There are fields that are empty, please provide the requested information.')
                                    $('#divisa').focus() 
                                }else{
                                    if (pago === "0"){
                                        alert('There are fields that are empty, please provide the requested information.')
                                        $('#pago').focus()
                                    }else{
                                        if (total === "0000.00") {
                                            alert('There are fields that are empty, please provide the requested information.')
                                            $('#i-search').focus()
                                        } else {
                                            if (envio === "") {
                                                alert('There are fields that are empty, please provide the requested information.')
                                                $('#envio').focus()
                                            } else {
                                                updateCotizacion(sres, atc, subtotal, desc, subtotal2, envio, total, idEdit, incoterm, divisa, pago, mEnvio, destino, zipcode) 
                                            }
                                        }
                                    }        
                                }
                            }
                        }
                    }
                }
            }
        }
    })

    $(document).on('click', '#btnSavedE', function(e){
        e.preventDefault();
        var sres = $('#sresE').val()
        var atc = $('#atcE').val()
        var subtotal = $('#subtotalE').val()
        var desc = $('#descE').val()
        var subtotal2 = $('#subtotal2E').val()
        var envio = $('#envioE').val()
        var total = $('#totalE').val()
        var incoterm = $('#incotermE').val()
        var divisa = $('#divisaE').val()
        var pago = $('#pagoE').val()
        var mEnvio = $('#envioME').val()
        var destino = $('#countryE').val()
        var zipcode = $('#zipcodeE').val()
        var count = $('#countEdit').val()
        var nItem = parseInt(count) + parseInt(1);
        var idEdit = $('#idEdit').val()
        let datas = []

        for (let i = 1; i < nItem; i++) {
            let model = $('#iEe-hidden-'+i+'').val()
            let image = $('#ihEe-image-'+i+'').val()
            let maker = $('#ihEe-maker-'+i+'').val()
            let name = $('#nameEe-'+i+'').text()
            let cant = $('#cantEe-'+i+'').text()
            let precio = $('#precioEe-'+i+'').text()
            let totalprecio = $('#totalPrecioEe-'+i+'').text()

            datas.push({
                'model' : model,
                'image' : image,
                'maker' : maker,
                'name' : name,
                'cant' : cant,
                'precio' : precio,
                'totalprecio' : totalprecio
            })
        }  

        let nArray = datas.length
        
        if (sres === ""){
            $('#sresE').focus()
            alert('There are fields that are empty, please provide the requested information.')
        }else{
            if (atc === ""){
                alert('There are fields that are empty, please provide the requested information.')
                $('#atcE').focus()
            }else{
                if (mEnvio === "0"){
                    alert('There are fields that are empty, please provide the requested information.')
                    $('#envioME').focus()
                }else{
                    if (destino === "0"){
                        alert('There are fields that are empty, please provide the requested information.')
                        $('#countryE').focus()
                    }else{
                        if (zipcode === ""){
                            alert('There are fields that are empty, please provide the requested information.')
                            $('#countryE').focus()
                        }else{
                            if (incoterm === "0"){
                                alert('There are fields that are empty, please provide the requested information.')
                                $('#incotermE').focus()
                            }else{
                                if (divisa === "0"){
                                    alert('There are fields that are empty, please provide the requested information.')
                                    $('#divisaE').focus() 
                                }else{
                                    if (pago === "0"){
                                        alert('There are fields that are empty, please provide the requested information.')
                                        $('#pagoE').focus()
                                    }else{
                                        if (total === "0000.00") {
                                            alert('There are fields that are empty, please provide the requested information.')
                                            $('#i-searchE').focus()
                                        } else {
                                            if (envio === "") {
                                                alert('There are fields that are empty, please provide the requested information.')
                                                $('#envioE').focus()
                                            } else {
                                                if (nArray === 0){
                                                    updateCotizacion(sres, atc, subtotal, desc, subtotal2, envio, total, idEdit, incoterm, divisa, pago, mEnvio, destino, zipcode) 
                                                }else{
                                                    updateCotizacion2(sres, atc, subtotal, desc, subtotal2, envio, total, idEdit,datas, incoterm, divisa, pago, mEnvio, destino, zipcode) 
                                                }  
                                            }
                                        }
                                    }        
                                }
                            }
                        }
                    }
                }
            }
        }
    }) 

    $('#envio').keyup(function(e){
        e.preventDefault()
        var valor = $(this).val()
        var subtotal = $('#subtotal2').val()
    
        if (valor != "") {
            if (e.keyCode == 13) {
                var sumar = parseFloat(valor) + parseFloat(subtotal)
                $('#total').val(sumar.toFixed(2))
            }
        }else{
            if (e.keyCode == 13) {
                $('#total').val(subtotal)
            }
        }
    })

    $('#envioE').keyup(function(e){
        e.preventDefault()
        var valor = $(this).val()
        var subtotal = $('#subtotal2E').val()
    
        if (valor != "") {
            if (e.keyCode == 13) {
                var sumar = parseFloat(valor) + parseFloat(subtotal)
                $('#totalE').val(sumar.toFixed(2))
            }
        }else{
            if (e.keyCode == 13) {
                $('#totalE').val(subtotal)
            }
        }
    })

    function searchProducts(consulta, consulta1){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchProducts.php',
            type: 'POST',
            data: {consulta, consulta1},
        })
        .done(function(respuesta){
            var nItem = $('#count').val()
            var subtotal = $('#subtotal').val()
            nItem = parseInt(nItem) + parseInt(1) 
            var data = JSON.parse(respuesta)
            var precio = data.price
            var cant = data.cant
            var totalprecio = parseFloat(precio) * parseFloat(cant)
            $('#list-product').append("<tr id='item-"+nItem+"'><th scope='row'>"+nItem+"</th><td id='name-"+nItem+"'>"+data.name+"<input type='hidden' id='i-hidden-"+nItem+"' value='"+data.model+"'/><input type='hidden' id='ih-image-"+nItem+"' value='"+data.image+"'/><input type='hidden' id='ih-maker-"+nItem+"' value='"+data.description+"'/></td><td id='cant-"+nItem+"'>"+data.cant+"</td><td id='precio-"+nItem+"'>"+data.price+"</td><td id='totalPrecio-"+nItem+"'>"+totalprecio.toFixed(2)+"</td><td><button type='button' id='btnRemove' value='"+nItem+"' class='btn btn-danger'>X</button></td></tr>"
            )
            $('#count').val(nItem)
            var sumaSubtotal = parseFloat(totalprecio) + parseFloat(subtotal)
            $('#subtotal').val(sumaSubtotal.toFixed(2))
            var porcentajeDescuento = parseFloat($('#subtotal').val() * 0.18)
            $('#desc').val(porcentajeDescuento.toFixed(2))
            var sumaSubtotal2 = parseFloat($('#subtotal').val()) - parseFloat($('#desc').val())
            $('#subtotal2').val(sumaSubtotal2.toFixed(2))
            $('#total').val($('#subtotal2').val())
            $('#i-search').val("")
            $('#i-cant').val("")
            $('#i-search').focus()
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchProductsE(consulta, consulta1){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchProducts.php',
            type: 'POST',
            data: {consulta, consulta1},
        })
        .done(function(respuesta){
            var nItem = $('#count').val()
            var nItemE = $('#countEdit').val()
            var subtotal = $('#subtotalE').val()
            nItem = parseInt(nItem) + parseInt(1) 
            nItemE = parseInt(nItemE) + parseInt(1) 
            var data = JSON.parse(respuesta)
            var precio = data.price
            var cant = data.cant
            var totalprecio = parseFloat(precio) * parseFloat(cant)
            $('#list-productE').append("<tr id='itemE-"+nItem+"'><th scope='row'>"+nItem+"</th><td id='nameEe-"+nItemE+"'>"+data.name+"<input type='hidden' id='iEe-hidden-"+nItemE+"' value='"+data.model+"'/><input type='hidden' id='ihEe-image-"+nItemE+"' value='"+data.image+"'/><input type='hidden' id='ihEe-maker-"+nItemE+"' value='"+data.description+"'/></td><td id='cantEe-"+nItemE+"'>"+data.cant+"</td><td id='precioEe-"+nItemE+"'>"+data.price+"</td><td id='totalPrecioEe-"+nItemE+"'>"+totalprecio.toFixed(2)+"</td><td><button type='button' id='btnRemoveE' value='"+nItem+"' class='btn btn-danger'>X</button></td></tr>"
            )
            $('#count').val(nItem)
            $('#countEdit').val(nItemE)
            var sumaSubtotal = parseFloat(totalprecio) + parseFloat(subtotal)
            $('#subtotalE').val(sumaSubtotal.toFixed(2))
            var porcentajeDescuento = parseFloat($('#subtotalE').val() * 0.18)
            $('#descE').val(porcentajeDescuento.toFixed(2))
            var sumaSubtotal2 = parseFloat($('#subtotalE').val()) - parseFloat($('#descE').val())
            $('#subtotal2E').val(sumaSubtotal2.toFixed(2))
            $('#totalE').val($('#subtotal2E').val())
            $('#i-searchE').val("")
            $('#i-cantE').val("")
            $('#i-searchE').focus()
        })
        .fail(function(){
            console.log("error");
        })
    }

    function createdSession(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/createSession.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){            
            window.open('http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/createPDF.php', '_blank')            
            location = location
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchCotizacion(consulta, newUrl){
        var url =  $(location).attr('host')+''+$(location).attr('pathname')
    	var newUrl = url.replace("wp-admin/admin.php", "")

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchCotizacion.php',
            type: 'POST',
            data: {consulta, newUrl},
        })
        .done(function(respuesta){
            $('#cc').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    function savedCotizacion(sres, atc, subtotal, desc, subtotal2, envio, total, datas, incoterm, divisa, pago, newUrl, mEnvio, destino, zipcode){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/registerCotizacion.php',
            type: 'POST',
            data: {sres, atc, subtotal, desc, subtotal2, envio, total, datas, incoterm, divisa, pago, newUrl, mEnvio, destino, zipcode},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.registro === 'correcto'){
                alert("Quote was made successfully.")
                searchCotizacion();
                $('.btnc').click()
                var id = data.id
                createdSession(id)
            }else{
                alert("Quote creation failed due to an error.")
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function updateCotizacion(sres, atc, subtotal, desc, subtotal2, envio, total, idEdit, incoterm, divisa, pago, mEnvio, destino, zipcode){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/updateCotizacion.php',
            type: 'POST',
            data: {sres, atc, subtotal, desc, subtotal2, envio, total, idEdit, incoterm, divisa, pago, mEnvio, destino, zipcode},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.update === 'correcto'){
                alert("The quote was successfully changed!")
                searchCotizacion();                
                $('.btncE').click()
                var id = data.id
                createdSession(id)
            }else{
                alert("The quote could not be modified due to an error.")
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function updateCotizacion2(sres, atc, subtotal, desc, subtotal2, envio, total, idEdit, datas, incoterm, divisa, pago, mEnvio, destino, zipcode){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/updateCotizacion2.php',
            type: 'POST',
            data: {sres, atc, subtotal, desc, subtotal2, envio, total, idEdit, datas, incoterm, divisa, pago, mEnvio, destino, zipcode},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.update === 'correcto'){
                alert("The quote was successfully changed!")
                searchCotizacion();
                $('.btncE').click()
                var id = data.id
                createdSession(id)
            }else{
                alert("The quote could not be modified due to an error..")
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

   function editCotizacion(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/editCotizacion.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            var sres = data.sres
            var atc = data.atc
            var subtotal = data.subtotal
            var desc = data.desc
            var subtotal2 = data.subtotal2
            var mEnvio = data.mEnvio
            var destino = data.destino
            var zipcode = data.zipcode
            var envio = data.envio
            var total = data.total
            var incoterm = data.incoterm
            var divisa = data.divisa
            var pago = data.pago
            var a = data.data
            var nItem = $('#count').val()

            $('#sresE').val(sres)
            $('#atcE').val(atc)
            $('#subtotalE').val(subtotal)
            $('#descE').val(desc)
            $('#subtotal2E').val(subtotal2)
            $('#envioME').val(mEnvio)
            $('#countryE').val(destino)
            $('#zipcodeE').val(zipcode)
            $('#incotermE').val(incoterm)
            $('#divisaE').val(divisa)
            $('#pagoE').val(pago)
            $('#envioE').val(envio)
            $('#totalE').val(total)
            
            $.each(a, function (i, element) { 
                var aid = element.aid
                var name = element.name
                var cant = element.cant
                var valorU = element.valorU
                var valorT = element.valorT
                nItem = parseInt(nItem) + parseInt(1) 
                $('#count').val(nItem)

                $('#list-productE').append("<tr id='itemE-"+nItem+"'><th scope='row'>"+nItem+"</th><td id='nameE-"+nItem+"'>"+name+"<input type='hidden' id='iE-hidden-"+nItem+"' value='"+aid+"'/></td><td id='cantE-"+nItem+"'>"+cant+"</td><td id='precioE-"+nItem+"'>"+valorU+"</td><td id='totalPrecioE-"+nItem+"'>"+valorT+"</td><td><button type='button' id='btnRemoveE' value='"+nItem+"' class='btn btn-danger'>X</button></td></tr>"  
                );
            })
        })
        .fail(function(){
            console.log("error")
        })
    }

    function deleteCotizacion(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/deleteCotizacion.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $data = JSON.parse(respuesta)
            if ($data.delete === 'correcto'){
                alert("Quote was successfully removed!")
                $('.btn-close').click()
                searchCotizacion()
            }else{
                alert("Quote delete error occurred.")
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function deleteProduct(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/deleteProduct.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){

        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchCountry(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchCountry.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $('#country').html(respuesta);
            $('#countryE').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    $(document).on('click', '#btnRemove', function(){
        var valor = $(this).val()
        var totalPrecio = $('#totalPrecio-'+valor+'').text()
        var subtotal = $('#subtotal').val()
        var restar = parseFloat(subtotal) - parseFloat(totalPrecio);
        $('#subtotal').val(restar.toFixed(2))
        var porcentajeDescuento = parseFloat($('#subtotal').val() * 0.18)
        $('#desc').val(porcentajeDescuento.toFixed(2))
        var sumaSubtotal2 = parseFloat($('#subtotal').val()) - parseFloat($('#desc').val())
        $('#subtotal2').val(sumaSubtotal2.toFixed(2))
        var envio = $('#envio').val()
        var subtotal = $('#subtotal2').val()
        var sumar = parseFloat(envio) + parseFloat(subtotal)
        $('#total').val(sumar.toFixed(2))
                
        $('#item-'+valor+'').remove()
    })

    $(document).on('click', '#btnRemoveE', function(){
        var valor = $(this).val()
        var totalPrecio = $('#totalPrecioE-'+valor+'').text()
        var subtotal = $('#subtotalE').val()
        var restar = parseFloat(subtotal) - parseFloat(totalPrecio);
        $('#subtotalE').val(restar.toFixed(2))
        var porcentajeDescuento = parseFloat($('#subtotalE').val() * 0.18)
        $('#descE').val(porcentajeDescuento.toFixed(2))
        var sumaSubtotal2 = parseFloat($('#subtotalE').val()) - parseFloat($('#descE').val())
        $('#subtotal2E').val(sumaSubtotal2.toFixed(2))
        var envio = $('#envioE').val()
        var subtotal = $('#subtotal2E').val()
        var sumar = parseFloat(envio) + parseFloat(subtotal)
        $('#totalE').val(sumar.toFixed(2))
        
        var aid = $('#iE-hidden-'+valor+'').val()
        deleteProduct(aid)
        $('#itemE-'+valor+'').remove()
        
    })
})

