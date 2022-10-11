jQuery(document).ready(function($){

    searchCotizacion()
    searchCountry()
    searchCountryRates()
    searchWeightAir()
    searchWeightAirEdit()
    searchWeightMaritime()
    searchWeightMaritimeEdit()
    searchRates()

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

    $(document).on('keyup', '#i-searchCountryRates', function(){
        var valor = $(this).val()
        searchRates(valor)
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

    $(document).on('click', '#w-close', function(e){
        $('#weightMaritime').removeClass('block')
        $('#weightAir').removeClass('block')
        $('#weightMaritime').addClass('none')
        $('#weightAir').addClass('none')   
    })

    $(document).on('click', '#w-cancel', function(e){
        $('#weightMaritime').removeClass('block')
        $('#weightAir').removeClass('block')
        $('#weightMaritime').addClass('none')
        $('#weightAir').addClass('none')
    })

    $(document).on('click', '.r-close', function(e){
        $('#newWeightMaritime').removeClass('block')
        $('#newWeightAir').removeClass('block')
        $('#newWeightMaritime').addClass('none')
        $('#newWeightAir').addClass('none')          
        $('#editWeightMaritime').removeClass('block')
        $('#editWeightAir').removeClass('block')
        $('#editWeightMaritime').addClass('none')
        $('#editWeightAir').addClass('none')   
        $('#modifyRate-content').removeClass('block')
        $('#modifyRate-content').addClass('none')        
        $('#newRate-content').removeClass('block')
        $('#newRate-content').addClass('none')
        $('#option1').removeAttr('checked')
        $('#option2').removeAttr('checked') 
        $('#country').val(0)
        $('#countryEdit').val(0)
        $('#weightTypeNew').val(0)
        $('#weightTypeEdit').val(0)
    })

    $(document).on('click', '.r-cancel', function(e){
        $('#newWeightMaritime').removeClass('block')
        $('#newWeightAir').removeClass('block')
        $('#newWeightMaritime').addClass('none')
        $('#newWeightAir').addClass('none')  
        $('#editWeightMaritime').removeClass('block')
        $('#editWeightAir').removeClass('block')
        $('#editWeightMaritime').addClass('none')
        $('#editWeightAir').addClass('none')   
        $('#modifyRate-content').removeClass('block')
        $('#modifyRate-content').addClass('none')              
        $('#newRate-content').removeClass('block')
        $('#newRate-content').addClass('none')
        $('#option1').removeAttr('checked')
        $('#option2').removeAttr('checked') 
        $('#country').val(0)
        $('#countryEdit').val(0)        
        $('#weightTypeNew').val(0)
        $('#weightTypeEdit').val(0)
    })

    $(document).on('click', '#saveWeight', function(e){
        if ($('#weightAir').hasClass('block')){
            var valor = $('#i-kg').val()
            addWeightAir(valor) 
        }else{
            if ($('#weightMaritime').hasClass('block')){
                var valor = $('#i-m3').val()
                addWeightMaritime(valor) 
            }
        }       
    })

    $(document).on('click', '#option1', function(e){
        $('#modifyRate-content').removeClass('none')
        $('#newRate-content').addClass('block')  
        $('#modifyRate-content').removeClass('block')
        $('#modifyRate-content').addClass('none')  
    })

    $(document).on('click', '#option2', function(e){
        $('#modifyRate-content').removeClass('none')
        $('#modifyRate-content').addClass('block')  
        $('#newRate-content').removeClass('block')
        $('#newRate-content').addClass('none')   
    })

    $(document).on('change', '#weightType', function(e){
        var valor = $(this).val()
        if (valor === '1'){
            $('#weightMaritime').removeClass('block')
            $('#weightMaritime').addClass('none')
            $('#weightAir').removeClass('none')
            $('#weightAir').addClass('block')
        }else{
            if (valor === '2'){
                $('#weightAir').removeClass('block')
                $('#weightAir').addClass('none')
                $('#weightMaritime').removeClass('none')
                $('#weightMaritime').addClass('block')
            }else{
                $('#weightMaritime').removeClass('block')
                $('#weightAir').removeClass('block')
                $('#weightMaritime').addClass('none')
                $('#weightAir').addClass('none')
            }
        }
    })

    $(document).on('change', '#weightTypeEdit', function(e){
        var valor = $(this).val()
        if (valor === '1'){
            $('#editWeightMaritime').removeClass('block')
            $('#editWeightMaritime').addClass('none')
            $('#editWeightAir').removeClass('none')
            $('#editWeightAir').addClass('block')
            var country = $('#countryEdit').val()
            searchWeightAirEdit(country)
        }else{
            if (valor === '2'){
                $('#editWeightAir').removeClass('block')
                $('#editWeightAir').addClass('none')
                $('#editWeightMaritime').removeClass('none')
                $('#editWeightMaritime').addClass('block')
                var country = $('#countryEdit').val()
                searchWeightAirEdit(country)
            }else{
                $('#editWeightMaritime').removeClass('block')
                $('#editWeightAir').removeClass('block')
                $('#editWeightMaritime').addClass('none')
                $('#editWeightAir').addClass('none')
            }
        }
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
                                                savedCotizacion(sres, atc, subtotal, desc, subtotal2, envio, total, idEdit, incoterm, divisa, pago, newUrl, mEnvio, destino, zipcode) 
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
            $('#country2').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchCountryRates(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchCountryRates.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $('#countryEdit').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }


    function searchWeightAir(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchWeightAir.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $('#weightAirNewRate').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchWeightAirEdit(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchWeightAirEdit.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $('#weightAirEditRate').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchWeightMaritime(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchWeightMaritime.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $('#weightMaritimeNewRate').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchWeightMaritimeEdit(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchWeightMaritimeEdit.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $('#weightMaritimeEditRate').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    function addWeightAir(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/alterAir.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.register === 'exists'){
                alert('The weight you are trying to add already exists in the database')
            }else{
                if (data.register === 'correcto'){
                    alert('Weight was successfully recorded')
                    $('#i-kg').val("") 
                    $('#weightType').val(0)
                    $('#weightMaritime').removeClass('block')
                    $('#weightAir').removeClass('block')
                    $('#weightMaritime').addClass('none')
                    $('#weightAir').addClass('none')
                    searchWeightAir()
                    searchRates()
                }
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function addWeightMaritime(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/alterMaritime.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.register === 'exists'){
                alert('The weight you are trying to add already exists in the database')
            }else{
                if (data.register === 'correcto'){
                    alert('Weight was successfully recorded')
                    $('#weightMaritime').removeClass('block')
                    $('#weightAir').removeClass('block')
                    $('#weightMaritime').addClass('none')
                    $('#weightAir').addClass('none')
                    $('#i-m3').val("")
                    $('#weightType').val(0)
                    searchWeightMaritime()
                    searchRates()
                }
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function registerRateAir(country, weight, price){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/registerRateAir.php',
            type: 'POST',
            data: {country, weight, price},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.register === 'exists'){
                alert('The country rate you are trying to add already exists in the database')
            }else{
                if (data.register === 'correcto'){
                    alert("The country rate's was successfully recorded")
                    $('#i-airPrice').val("")                    
                    $('#option1').removeAttr('checked')
                    $('#newRate-content').removeClass('block')
                    $('#newRate-content').addClass('none')
                    $('#newWeightAir').removeClass('block')
                    $('#newWeightMaritime').removeClass('block')
                    $('#newWeightAir').addClass('none')
                    $('#newWeightMaritime').addClass('none')
                    $('#weightAirNewRate').val(0)
                    $('#weightTypeNew').val(0)
                    $('#country2').val(0)
                    searchWeightMaritime()
                    searchRates()
                }
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function registerRateMaritime(country, weight, price){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/registerRateMaritime.php',
            type: 'POST',
            data: {country, weight, price},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.register === 'exists'){
                alert('The country rate you are trying to add already exists in the database')
            }else{
                if (data.register === 'correcto'){
                    alert("The country rate's was successfully recorded")
                    $('#i-maritimePrice').val("")                    
                    $('#option1').removeAttr('checked')
                    $('#newRate-content').removeClass('block')
                    $('#newRate-content').addClass('none')                    
                    $('#newWeightAir').removeClass('block')
                    $('#newWeightMaritime').removeClass('block')
                    $('#newWeightAir').addClass('none')
                    $('#newWeightMaritime').addClass('none')
                    $('#weightMaritimeNewRate').val(0)
                    $('#weightTypeNew').val(0)
                    $('#country2').val(0)
                    searchWeightMaritime()
                    searchRates()
                }
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function updateRateAir(country, weight, price){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/updateRateAir.php',
            type: 'POST',
            data: {country, weight, price},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.update === 'correcto'){
                alert("The rate was successfully changed!")
                searchRates();
                $('#i-airPriceEdit').val("")                    
                $('#option2').removeAttr('checked')
                $('#modifyRate-content').removeClass('block')
                $('#modifyRate-content').addClass('none')
                $('#editWeightAir').removeClass('block')
                $('#editWeightMaritime').removeClass('block')
                $('#editWeightAir').addClass('none')
                $('#editWeightMaritime').addClass('none')
                $('#weightAirEditRate').val(0)
                $('#weightTypeEdit').val(0)
                $('#countryEdit').val(0)
            }else{
                alert("The rate could not be modified due to an error.")
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function updateRateMaritime(country, weight, price){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/updateRateMaritime.php',
            type: 'POST',
            data: {country, weight, price},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            if (data.update === 'correcto'){
                alert("The rate was successfully changed!")
                searchRates();
                $('#i-maritimePriceEdit').val("")                    
                $('#option2').removeAttr('checked')
                $('#modifyRate-content').removeClass('block')
                $('#modifyRate-content').addClass('none')
                $('#editWeightAir').removeClass('block')
                $('#editWeightMaritime').removeClass('block')
                $('#editWeightAir').addClass('none')
                $('#editWeightMaritime').addClass('none')
                $('#weightMaritimeEditRate').val(0)
                $('#weightTypeEdit').val(0)
                $('#countryEdit').val(0)
            }else{
                alert("The rate could not be modified due to an error.")
            }
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchRates(consulta){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchRates.php',
            type: 'POST',
            data: {consulta},
        })
        .done(function(respuesta){
            $('#rc').html(respuesta);
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchPriceWeightAir(consulta, consulta2){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchPriceWeightAir.php',
            type: 'POST',
            data: {consulta, consulta2},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            $('#i-airPriceEdit').val(data.price)
            $('#i-airPriceEdit').focus()
        })
        .fail(function(){
            console.log("error");
        })
    }

    function searchPriceWeightMaritime(consulta, consulta2){

        $.ajax({
            url: 'http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/classes/searchPriceWeightMaritime.php',
            type: 'POST',
            data: {consulta, consulta2},
        })
        .done(function(respuesta){
            var data = JSON.parse(respuesta)
            $('#i-maritimePriceEdit').val(data.price)
            $('#i-maritimePriceEdit').focus()
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

    $(document).on('change', '#weightTypeNew', function(){
        var valor = $(this).val()
        if (valor === '1'){
            $('#newWeightMaritime').removeClass('block')
            $('#newWeightMaritime').addClass('none')
            $('#newWeightAir').removeClass('none')
            $('#newWeightAir').addClass('block')
            var country = $('#country2').val()
            searchWeightAir(country)
        }else{
            if (valor === '2'){
                $('#newWeightAir').removeClass('block')
                $('#newWeightAir').addClass('none')
                $('#newWeightMaritime').removeClass('none')
                $('#newWeightMaritime').addClass('block')
                var country = $('#country2').val()
                searchWeightMaritime(country)
            }else{
                $('#newWeightMaritime').removeClass('block')
                $('#newWeightAir').removeClass('block')
                $('#newWeightMaritime').addClass('none')
                $('#newWeightAir').addClass('none')
            }
        }
    })

    $(document).on('change', '#country2', function(){
        $('#weightTypeNew').val(0)
        $('#newWeightAir').removeClass('block')
        $('#newWeightAir').addClass('none')
        $('#newWeightMaritime').removeClass('block')
        $('#newWeightMaritime').addClass('none')
    })

    $(document).on('change', '#countryEdit', function(){
        $('#weightTypeEdit').val(0)
        $('#weightMaritimeEditRate').val(0)
        $('#editWeightAir').removeClass('block')
        $('#editWeightAir').addClass('none')
        $('#editWeightMaritime').removeClass('block')
        $('#editWeightMaritime').addClass('none')
        $('#i-airPriceEdit').val("")
        $('#i-maritimePriceEdit').val("")
    })

    $(document).on('change', '#weightAirEditRate', function(){
        var valor = $(this).val()
        var valor2 = $('#countryEdit').val()
        if (valor2 == '0'){
            alert('You need to select the country in which you want to change the rate.')
            $('#weightAirEditRate').val(0)
        }else{
            if (valor == '0'){
                alert('You must select the weight of the rate you want to change.')
                $('#weightAirEditRate').val(0)
                $('#i-airPriceEdit').val('')
            }else{
                searchPriceWeightAir(valor, valor2)
            }
        }
    })

    $(document).on('change', '#weightMaritimeEditRate', function(){
        var valor = $(this).val()
        var valor2 = $('#countryEdit').val()
        if (valor2 == '0'){
            alert('You need to select the country in which you want to change the rate.')
            $('#weightAirEditRate').val(0)
        }else{
            if (valor == '0'){
                alert('You must select the weight of the rate you want to change.')
                $('#weightAirEditRate').val(0)
                $('#i-airPriceEdit').val('')
            }else{
                searchPriceWeightMaritime(valor, valor2)
            }
        }
    })

    $(document).on('click', '#btnSavedNewRate', function(){
        if ($('#newRate-content').hasClass('block')){
            if ($('#newWeightAir').hasClass('block')){
                var country = $('#country2').val()
                var weight = $('#weightAirNewRate').val()
                var price = $('#i-airPrice').val()

                registerRateAir(country, weight, price)
                searchCountryRates()
            }else{
                if ($('#newWeightMaritime').hasClass('block')){
                    var country = $('#country2').val()
                    var weight = $('#weightMaritimeNewRate').val()
                    var price = $('#i-maritimePrice').val()
    
                    registerRateMaritime(country, weight, price)
                    searchCountryRates()
                }
            }
        }else{
            if($('#modifyRate-content').hasClass('block')){
                if ($('#editWeightAir').hasClass('block')){ 
                    var country = $('#countryEdit').val()
                    var weight = $('#weightAirEditRate').val()
                    var price = $('#i-airPriceEdit').val()
    
                    updateRateAir(country, weight, price)
                    searchCountryRates()
                }else{
                    if ($('#editWeightMaritime').hasClass('block')){
                        var country = $('#countryEdit').val()
                        var weight = $('#weightMaritimeEditRate').val()
                        var price = $('#i-maritimePriceEdit').val()
        
                        updateRateMaritime(country, weight, price)
                        searchCountryRates()
                    }
                }
            }
        }
    })
})

