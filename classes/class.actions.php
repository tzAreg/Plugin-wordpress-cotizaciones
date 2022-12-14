<?php 

    class actions{
        function activated(){

            global $wpdb;
    
            $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}cotizacion` (`cotizacion_id` INT NOT NULL AUTO_INCREMENT , `cotizacion_domain` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_sres` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_atencion` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_create_at` TIMESTAMP NOT NULL , `cotizacion_metodo_envio` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_destino` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_zipcode` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_incoterm` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_divisa` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_metodo_pago` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_submit` DECIMAL(10,2) NOT NULL , `cotizacion_iva` DECIMAL(10,2) NOT NULL , `cotizacion_descuento` DECIMAL(10,2) NOT NULL , `cotizacion_subtotal` DECIMAL(10,2) NOT NULL , `cotizacion_envio` DECIMAL(10,2) NOT NULL , `cotizacion_total` DECIMAL(10,2) NOT NULL , PRIMARY KEY (`cotizacion_id`)) ENGINE = InnoDB;";
    
            $wpdb->query($sql);
    
    
    
            $sql2 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}cotizacion_detalle` (`cotizacion_detalle_aid` INT NOT NULL AUTO_INCREMENT , `cotizacion_detalle_id` INT NOT NULL , `cotizacion_detalle_name` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_detalle_model` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_detalle_maker` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_detalle_image` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_detalle_cant` INT NOT NULL , `cotizacion_detalle_unid` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , `cotizacion_detalle_valor_unit` DECIMAL(10,2) NOT NULL , `cotizacion_detalle_valor_total` DECIMAL(10,2) NOT NULL , PRIMARY KEY (`cotizacion_detalle_aid`)) ENGINE = InnoDB;";
            $wpdb->query($sql2);
            
            $sql3 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}paises` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `iso` char(2) DEFAULT NULL,
                `es` varchar(80) DEFAULT NULL,
                `en` varchar(80) DEFAULT NULL,
                `fr` varchar(80) DEFAULT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";     
            $wpdb->query($sql3);
    
            $paises = [
                array(
                    'id' => 1,
                    'iso' => 'AF',
                    'nombre' => 'Afganist??n',
                    'name' => 'Afghanistan',
                    'nom' => 'Afghanistan'
                ),
                array(
                    'id' => 2,
                    'iso' => 'AX',
                    'nombre' => 'Islas Gland',
                    'name' => 'Gland Islands',
                    'nom' => '??les Gland'
                ),
                array(
                    'id' => 3,
                    'iso' => 'AL',
                    'nombre' => 'Albania',
                    'name' => 'Albania',
                    'nom' => 'Albanie'
                ),
                array(
                    'id' => 4,  
                    'iso' => 'DE', 
                    'nombre' => 'Alemania',
                    'name' => 'Germany',
                    'nom' => 'Allemagne'
                ),
                array(
                    'id' => 5,  
                    'iso' => 'AD', 
                    'nombre' => 'Andorra',
                    'name' => 'Andorra',
                    'nom' => 'Andorre'
                ),
                array(
                    'id' => 6,  
                    'iso' => 'AO', 
                    'nombre' => 'Angola',
                    'name' => 'Angola',
                    'nom' => 'Angola'
                ),
                array(
                    'id' => 7,  
                    'iso' => 'AI', 
                    'nombre' => 'Anguilla',
                    'name' => 'Anguilla',
                    'nom' => 'Anguilla'
                ),
                array(
                    'id' => 8,  
                    'iso' => 'AQ', 
                    'nombre' => 'Ant??rtida',
                    'name' => 'Antarctica',
                    'nom' => 'Antarctique'
                ),
                array(
                    'id' => 9,  
                    'iso' => 'AG', 
                    'nombre' => 'Antigua y Barbuda',
                    'name' => 'Antigua and Barbuda',
                    'nom' => 'Antigua-et-Barbuda'
                ),
                array(
                    'id' => 10, 
                    'iso' => 'AN', 
                    'nombre' =>  'Antillas Holandesas',
                    'name' => 'Netherlands Antilles',
                    'nom' => 'Antilles n??erlandaises'
                ),
                array(
                    'id' => 11, 
                    'iso' => 'SA', 
                    'nombre' =>  'Arabia Saud??ta',
                    'name' => 'Saudi Arabia',
                    'nom' => 'Arabie Saoudite'
                ),
                array(
                    'id' => 12, 
                    'iso' => 'DZ', 
                    'nombre' =>  'Argelia',
                    'name' => 'Algeria',
                    'nom' => 'Alg??rie'
                    
                ),
                array(
                    'id' => 13, 
                    'iso' => 'AR', 
                    'nombre' =>  'Argentina',
                    'name' => 'Argentina',
                    'nom' => 'Argentine'
                ),
                array(
                    'id' => 14, 
                    'iso' => 'AM', 
                    'nombre' =>  'Armenia',
                    'name' => 'Armenia',
                    'nom' => 'Arm??nie'
                ),
                array(
                    'id' => 15, 
                    'iso' => 'AW', 
                    'nombre' =>  'Aruba',
                    'name' => 'Aruba',
                    'nom' => 'Aruba'
                ),
                array(
                    'id' => 16, 
                    'iso' => 'AU', 
                    'nombre' =>  'Australia',
                    'name' => 'Australia',
                    'nom' => 'Australie'
                ),
                array(
                    'id' => 17, 
                    'iso' => 'AT', 
                    'nombre' =>  'Austria',
                    'name' => 'Austria',
                    'nom' => 'Autriche'
                ),
                array(
                    'id' => 18, 
                    'iso' => 'AZ', 
                    'nombre' =>  'Azerbaiy??n',
                    'name' => 'Azerbaijan',
                    'nom' => 'Azerba??djan'
                ),
                array(
                    'id' => 19, 
                    'iso' => 'BS', 
                    'nombre' =>  'Bahamas',
                    'name' => 'Bahamas',
                    'nom' => 'Bahamas'
                ),
                array(
                    'id' => 20, 
                    'iso' => 'BH', 
                    'nombre' =>  'Bahr??in',
                    'name' => 'Bahrain',
                    'nom' => 'Bahre??n'
                ),
                array(
                    'id' => 21, 
                    'iso' => 'BD', 
                    'nombre' =>  'Bangladesh',
                    'name' => 'Bangladesh',
                    'nom' => 'Bangladesh'
                ),
                array(
                    'id' => 22, 
                    'iso' => 'BB', 
                    'nombre' =>  'Barbados',
                    'name' => 'Barbados',
                    'nom' => 'Barbade'
                ),
                array(
                    'id' => 23, 
                    'iso' => 'BY', 
                    'nombre' =>  'Bielorrusia',
                    'name' => 'Belarus',
                    'nom' => 'Bi??lorussie'
                ),
                array(
                    'id' => 24, 
                    'iso' => 'BE', 
                    'nombre' =>  'B??lgica',
                    'name' => 'Belgium',
                    'nom' => 'Belgique'
                ),
                array(
                    'id' => 25, 
                    'iso' => 'BZ', 
                    'nombre' =>  'Belice',
                    'name' => 'Belize',
                    'nom' => 'Belize'
                ),
                array(
                    'id' => 26, 
                    'iso' => 'BJ', 
                    'nombre' =>  'Benin',
                    'name' => 'Benin',
                    'nom' => 'B??nin'
                ),
                array(
                    'id' => 27, 
                    'iso' => 'BM', 
                    'nombre' =>  'Bermudas',
                    'name' => 'Bermuda',
                    'nom' => 'Bermudes'
                ),
                array(
                    'id' => 28, 
                    'iso' => 'BT', 
                    'nombre' =>  'Bhut??n',
                    'name' => 'Bhutan',
                    'nom' => 'Bhoutan'
                ),
                array(
                    'id' => 29, 
                    'iso' => 'BO', 
                    'nombre' =>  'Bolivia',
                    'name' => 'Bolivia',
                    'nom' => 'Bolivie'
                ),
                array(
                    'id' => 30, 
                    'iso' => 'BA', 
                    'nombre' =>  'Bosnia y Herzegovina',
                    'name' => 'Bosnia and Herzegovina',
                    'nom' => 'Bosnie-Herz??govine'
                ),
                array(
                    'id' => 31, 
                    'iso' => 'BW', 
                    'nombre' =>  'Botsuana',
                    'name' => 'Botswana',
                    'nom' => 'Botswana'                
                ),
                array(
                    'id' => 32, 
                    'iso' => 'BV', 
                    'nombre' =>  'Isla Bouvet',
                    'name' => 'Bouvet Island',
                    'nom' => '??le Bouvet'
                ),
                array(
                    'id' => 33, 
                    'iso' => 'BR', 
                    'nombre' =>  'Brasil',
                    'name' => 'Brazil',
                    'nom' => 'Br??sil'
                ),
                array(
                    'id' => 34, 
                    'iso' => 'BN', 
                    'nombre' =>  'Brun??i',
                    'name' => 'Brunei',
                    'nom' => 'Brunei'
                ),
                array(
                    'id' => 35, 
                    'iso' => 'BG', 
                    'nombre' =>  'Bulgaria',
                    'name' => 'Bulgaria',
                    'nom' => 'Bulgarie'
                ),
                array(
                    'id' => 36, 
                    'iso' => 'BF', 
                    'nombre' =>  'Burkina Faso',
                    'name' => 'Burkina Faso',
                    'nom' => 'Burkina Faso'
                ),
                array(
                    'id' => 37, 
                    'iso' => 'BI', 
                    'nombre' =>  'Burundi',
                    'name' => 'Burundi',
                    'nom' => 'Burundi'
                ),
                array(
                    'id' => 38, 
                    'iso' => 'CV', 
                    'nombre' =>  'Cabo Verde',
                    'name' => 'Cape Verde',
                    'nom' => 'Cap Vert'
                ),
                array(
                    'id' => 39, 
                    'iso' => 'KY', 
                    'nombre' =>  'Islas Caim??n',
                    'name' => 'Cayman Islands',
                    'nom' => '??les Ca??manes'
                ),
                array(
                    'id' => 40, 
                    'iso' => 'KH', 
                    'nombre' =>  'Camboya',
                    'name' => 'Cambodia',
                    'nom' => 'Cambodge'
                ),
                array(
                    'id' => 41, 
                    'iso' => 'CM', 
                    'nombre' =>  'Camer??n',
                    'name' => 'Cameroon',
                    'nom' => 'Cameroun'
                ),
                array(
                    'id' => 42, 
                    'iso' => 'CA', 
                    'nombre' =>  'Canad??',
                    'name' => 'Canada',
                    'nom' => 'Canada'
                ),
                array(
                    'id' => 43, 
                    'iso' => 'CF', 
                    'nombre' =>  'Rep??blica Centroafricana',
                    'name' => 'Central African Republic',
                    'nom' => 'R??publique centrafricaine'
                ),
                array(
                    'id' => 44, 
                    'iso' => 'TD', 
                    'nombre' =>  'Chad',
                    'name' => 'Chad',
                    'nom' => 'Tchad'
                ),
                array(
                    'id' => 45, 
                    'iso' => 'CZ', 
                    'nombre' =>  'Rep??blica Checa',
                    'name' => 'Czech Republic',
                    'nom' => 'R??publique tch??que'
                ),
                array(
                    'id' => 46, 
                    'iso' => 'CL', 
                    'nombre' =>  'Chile',
                    'name' => 'Chile',
                    'nom' => 'Chili'
                ),
                array(
                    'id' => 47, 
                    'iso' => 'CN', 
                    'nombre' =>  'China',
                    'name' => 'China',
                    'nom' => 'Chine'
                ),
                array(
                    'id' => 48, 
                    'iso' => 'CY', 
                    'nombre' =>  'Chipre',
                    'name' => 'Cyprus',
                    'nom' => 'Chypre'
                ),
                array(
                    'id' => 49, 
                    'iso' => 'CX', 
                    'nombre' =>  'Isla de Navidad',
                    'name' => 'Christmas Island',
                    'nom' => '??le de No??l'
                ),
                array(
                    'id' => 50, 
                    'iso' => 'VA', 
                    'nombre' =>  'Ciudad del Vaticano',
                    'name' => 'Vatican City',
                    'nom' => 'Cit?? du Vatican'
                ),
                array(
                    'id' => 51, 
                    'iso' => 'CC', 
                    'nombre' =>  'Islas Cocos',
                    'name' => 'Cocos Islands',
                    'nom' => '??les Cocos'
                ),
                array(
                    'id' => 52, 
                    'iso' => 'CO', 
                    'nombre' =>  'Colombia',
                    'name' => 'Colombia',
                    'nom' => 'Colombie'
                ),
                array(
                    'id' => 53, 
                    'iso' => 'KM', 
                    'nombre' =>  'Comoras',
                    'name' => 'Comoros',
                    'nom' => 'Comores'
                ),
                array(
                    'id' => 54, 
                    'iso' => 'CD', 
                    'nombre' =>  'Rep??blica Democr??tica del Congo',
                    'name' => 'Democratic Republic of the Congo',
                    'nom' => 'R??publique d??mocratique du Congo'
                ),
                array(
                    'id' => 55, 
                    'iso' => 'CG', 
                    'nombre' =>  'Congo',
                    'name' => 'Congo',
                    'nom' => 'Congo'
                ),
                array(
                    'id' => 56, 
                    'iso' => 'CK', 
                    'nombre' =>  'Islas Cook',
                    'name' => 'Cook Islands',
                    'nom' => '??les Cook'
                ),
                array(
                    'id' => 57, 
                    'iso' => 'KP', 
                    'nombre' =>  'Corea del Norte',
                    'name' => 'North Korea',
                    'nom' => 'Cor??e du Nord'
                ),
                array(
                    'id' => 58, 
                    'iso' => 'KR', 
                    'nombre' =>  'Corea del Sur',
                    'name' => 'South Korea',
                    'nom' => 'Cor??e du Sud'
                ),
                array(
                    'id' => 59, 
                    'iso' => 'CI', 
                    'nombre' =>  'Costa de Marfil',
                    'name' => "C??te d'Ivoire",
                    'nom' => "C??te d'Ivoire"
                ),
                array(
                    'id' => 60, 
                    'iso' => 'CR', 
                    'nombre' =>  'Costa Rica',
                    'name' => 'Costa Rica',
                    'nom' => 'Costa Rica'
                ),
                array(
                    'id' => 61, 
                    'iso' => 'HR', 
                    'nombre' =>  'Croacia',
                    'name' => 'Croatia',
                    'nom' => 'Croatie'
                ),
                array(
                    'id' => 62, 
                    'iso' => 'CU', 
                    'nombre' =>  'Cuba',
                    'name' => 'Cuba',
                    'nom' => 'Cuba'
                ),
                array(
                    'id' => 63, 
                    'iso' => 'DK', 
                    'nombre' =>  'Dinamarca',
                    'name' => 'Denmark',
                    'nom' => 'Danemark'
                ),
                array(
                    'id' => 64, 
                    'iso' => 'DM', 
                    'nombre' =>  'Dominica',
                    'name' => 'Dominica',
                    'nom' => 'Dominique'
                ),
                array(
                    'id' => 65, 
                    'iso' => 'DO', 
                    'nombre' =>  'Rep??blica Dominicana',
                    'name' => 'Dominican Republic',
                    'nom' => 'R??publique dominicaine'
                ),
                array(
                    'id' => 66, 
                    'iso' => 'EC', 
                    'nombre' =>  'Ecuador',
                    'name' => 'Ecuador',
                    'nom' => '??quateur'
                ),
                array(
                    'id' => 67, 
                    'iso' => 'EG', 
                    'nombre' =>  'Egipto',
                    'name' => 'Egypt',
                    'nom' => '??gypte'
                ),
                array(
                    'id' => 68, 
                    'iso' => 'SV', 
                    'nombre' =>  'El Salvador',
                    'name' => 'El Salvador',
                    'nom' => 'El Salvador'
                ),
                array(
                    'id' => 69, 
                    'iso' => 'AE', 
                    'nombre' =>  'Emiratos ??rabes Unidos',
                    'name' => 'United Arab Emirates',
                    'nom' => '??mirats arabes unis'
                ),
                array(
                    'id' => 70, 
                    'iso' => 'ER', 
                    'nombre' =>  'Eritrea',
                    'name' => 'Eritrea',
                    'nom' => 'Erythr??e'
                ),
                array(
                    'id' => 71, 
                    'iso' => 'SK', 
                    'nombre' =>  'Eslovaquia',
                    'name' => 'Slovakia',
                    'nom' => 'Slovaquie'
                ),
                array(
                    'id' => 72, 
                    'iso' => 'SI', 
                    'nombre' =>  'Eslovenia',
                    'name' => 'Slovenia',
                    'nom' => 'Slov??nie'
                ),
                array(
                    'id' => 73, 
                    'iso' => 'ES', 
                    'nombre' =>  'Espa??a',
                    'name' => 'Spain',
                    'nom' => 'Espagne'
                ),
                array(
                    'id' => 74, 
                    'iso' => 'UM', 
                    'nombre' =>  'Islas ultramarinas de Estados Unidos',
                    'name' => 'United States Overseas Islands',
                    'nom' => "??les d'outre-mer des ??tats-Unis"
                ),
                array(
                    'id' => 75, 
                    'iso' => 'US', 
                    'nombre' =>  'Estados Unidos',
                    'name' => 'United States',
                    'nom' => '??tats Unis'
                ),
                array(
                    'id' => 76, 
                    'iso' => 'EE', 
                    'nombre' =>  'Estonia',
                    'name' => 'Estonia',
                    'nom' => 'Estonie'
                ),
                array(
                    'id' => 77, 
                    'iso' => 'ET', 
                    'nombre' =>  'Etiop??a',
                    'name' => 'Ethiopia',
                    'nom' => '??thiopie'
                ),
                array(
                    'id' => 78, 
                    'iso' => 'FO', 
                    'nombre' =>  'Islas Feroe',
                    'name' => 'Faroe Islands',
                    'nom' => '??les F??ro??'
                ),
                array(
                    'id' => 79, 
                    'iso' => 'PH', 
                    'nombre' =>  'Filipinas',
                    'name' => 'Philippines',
                    'nom' => 'Philippines'
                ),
                array(
                    'id' => 80, 
                    'iso' => 'FI', 
                    'nombre' =>  'Finlandia',
                    'name' => 'Finland',
                    'nom' => 'Finlande'
                ),
                array(
                    'id' => 81, 
                    'iso' => 'FJ', 
                    'nombre' =>  'Fiyi',
                    'name' => 'Fiji',
                    'nom' => 'Fidji'
                ),
                array(
                    'id' => 82, 
                    'iso' => 'FR', 
                    'nombre' =>  'Francia',
                    'name' => 'France',
                    'nom' => 'France'
                ),
                array(
                    'id' => 83, 
                    'iso' => 'GA', 
                    'nombre' =>  'Gab??n',
                    'name' => 'Gabon',
                    'nom' => 'Gabon'
                ),
                array(
                    'id' => 84, 
                    'iso' => 'GM', 
                    'nombre' =>  'Gambia',
                    'name' => 'Gambia',
                    'nom' => 'Gambie'
                ),
                array(
                    'id' => 85, 
                    'iso' => 'GE', 
                    'nombre' =>  'Georgia',
                    'name' => 'Georgia',
                    'nom' => 'G??orgie'
                ),
                array(
                    'id' => 86, 
                    'iso' => 'GS', 
                    'nombre' =>  'Islas Georgias del Sur y Sandwich del Sur',
                    'name' => 'South Georgia and the South Sandwich Islands',
                    'nom' => 'G??orgie du Sud et ??les Sandwich du Sud'
                ),
                array(
                    'id' => 87, 
                    'iso' => 'GH', 
                    'nombre' =>  'Ghana',
                    'name' => 'Ghana',
                    'nom' => 'Ghana'
                ),
                array(
                    'id' => 88, 
                    'iso' => 'GI', 
                    'nombre' =>  'Gibraltar',
                    'name' => 'Gibraltar',
                    'nom' => 'Gibraltar'
                ),
                array(
                    'id' => 89, 
                    'iso' => 'GD', 
                    'nombre' =>  'Granada',
                    'name' => 'Grenada',
                    'nom' => 'Grenade'
                ),
                array(
                    'id' => 90, 
                    'iso' => 'GR', 
                    'nombre' =>  'Grecia',
                    'name' => 'Greece',
                    'nom' => 'Gr??ce'
                ),
                array(
                    'id' => 91, 
                    'iso' => 'GL', 
                    'nombre' =>  'Groenlandia',
                    'name' => 'Greenland',
                    'nom' => 'Groenland'
                ),
                array(
                    'id' => 92, 
                    'iso' => 'GP', 
                    'nombre' =>  'Guadalupe',
                    'name' => 'Guadeloupe',
                    'nom' => 'Guadeloupe'
                ),
                array(
                    'id' => 93, 
                    'iso' => 'GU', 
                    'nombre' =>  'Guam',
                    'name' => 'Guam',
                    'nom' => 'Guam'
                ),
                array(
                    'id' => 94, 
                    'iso' => 'GT', 
                    'nombre' =>  'Guatemala',
                    'name' => 'Guatemala',
                    'nom' => 'Guatemala'
                ),
                array(
                    'id' => 95, 
                    'iso' => 'GF', 
                    'nombre' =>  'Guayana Francesa',
                    'name' => 'French Guiana',
                    'nom' => 'Guyane fran??aise'
                ),
                array(
                    'id' => 96, 
                    'iso' => 'GN', 
                    'nombre' =>  'Guinea',
                    'name' => 'Guinea',
                    'nom' => 'Guin??e'
                ),
                array(
                    'id' => 97, 
                    'iso' => 'GQ', 
                    'nombre' =>  'Guinea Ecuatorial',
                    'name' => 'Equatorial Guinea',
                    'nom' => 'Guin??e ??quatoriale'
                ),
                array(
                    'id' => 98, 
                    'iso' => 'GW', 
                    'nombre' =>  'Guinea-Bissau',
                    'name' => 'Guinea-Bissau',
                    'nom' => 'Guin??e-Bissau'
                ),
                array(
                    'id' => 99, 
                    'iso' => 'GY', 
                    'nombre' =>  'Guyana',
                    'name' => 'Guyana',
                    'nom' => 'Guyana'
                ),
                array(
                    'id' => 100, 
                    'iso' => 'HT', 
                    'nombre' =>  'Hait??',
                    'name' => 'Haiti',
                    'nom' => 'Ha??ti'
                ),
                array(
                    'id' => 101, 
                    'iso' => 'HM', 
                    'nombre' =>  'Islas Heard y McDonald',
                    'name' => 'Heard and McDonald Islands',
                    'nom' => '??les Heard et McDonald'
                ),
                array(
                    'id' => 102, 
                    'iso' => 'HN', 
                    'nombre' =>  'Honduras',
                    'name' => 'Honduras',
                    'nom' => 'Honduras'
                ),
                array(
                    'id' => 103, 
                    'iso' => 'HK', 
                    'nombre' =>  'Hong Kong',
                    'name' => 'Hong Kong',
                    'nom' => 'Hong Kong'
                ),
                array(
                    'id' => 104, 
                    'iso' => 'HU', 
                    'nombre' =>  'Hungr??a',
                    'name' => 'Hungary',
                    'nom' => 'Hongrie'
                ),
                array(
                    'id' => 105, 
                    'iso' => 'IN', 
                    'nombre' =>  'India',
                    'name' => 'India',
                    'nom' => 'Inde'
                ),
                array(
                    'id' => 106, 
                    'iso' => 'ID', 
                    'nombre' =>  'Indonesia',
                    'name' => 'Indonesia',
                    'nom' => 'Indon??sie'
                ),
                array(
                    'id' => 107, 
                    'iso' => 'IR', 
                    'nombre' =>  'Ir??n',
                    'name' => 'Iran',
                    'nom' => 'Iran'
                ),
                array(
                    'id' => 108, 
                    'iso' => 'IQ', 
                    'nombre' =>  'Iraq',
                    'name' => 'Iraq',
                    'nom' => 'Irak'
                ),
                array(
                    'id' => 109, 
                    'iso' => 'IE', 
                    'nombre' =>  'Irlanda',
                    'name' => 'Ireland',
                    'nom' => 'Irlande'
                ),
                array(
                    'id' => 110, 
                    'iso' => 'IS', 
                    'nombre' =>  'Islandia',
                    'name' => 'Iceland',
                    'nom' => 'Islande'
                ),
                array(
                    'id' => 111, 
                    'iso' => 'IL', 
                    'nombre' =>  'Israel',
                    'name' => 'Israel',
                    'nom' => 'Isra??l'
                ),
                array(
                    'id' => 112, 
                    'iso' => 'IT', 
                    'nombre' =>  'Italia',
                    'name' => 'Italy',
                    'nom' => 'Italie'
                ),
                array(
                    'id' => 113, 
                    'iso' => 'JM', 
                    'nombre' =>  'Jamaica',
                    'name' => 'Jamaica',
                    'nom' => 'Jama??que'
                ),
                array(
                    'id' => 114, 
                    'iso' => 'JP', 
                    'nombre' =>  'Jap??n',
                    'name' => 'Japan',
                    'nom' => 'Japon'
                ),
                array(
                    'id' => 115, 
                    'iso' => 'JO', 
                    'nombre' =>  'Jordania',
                    'name' => 'Jordan',
                    'nom' => 'Jordanie'
                ),
                array(
                    'id' => 116, 
                    'iso' => 'KZ', 
                    'nombre' =>  'Kazajst??n',
                    'name' => 'Kazakhstan',
                    'nom' => 'Kazakhstan'
                ),
                array(
                    'id' => 117, 
                    'iso' => 'KE', 
                    'nombre' =>  'Kenia',
                    'name' => 'Kenya',
                    'nom' => 'Kenya'
                ),
                array(
                    'id' => 118, 
                    'iso' => 'KG', 
                    'nombre' =>  'Kirguist??n',
                    'name' => 'Kyrgyzstan',
                    'nom' => 'Kirghizistan'
                ),
                array(
                    'id' => 119, 
                    'iso' => 'KI', 
                    'nombre' =>  'Kiribati',
                    'name' => 'Kiribati',
                    'nom' => 'Kiribati'
                ),
                array(
                    'id' => 120, 
                    'iso' => 'KW', 
                    'nombre' => 'Kuwait',
                    'name' => 'Kuwait',
                    'nom' => 'Kowe??t'
                ),
                array(
                    'id' => 121, 
                    'iso' => 'LA', 
                    'nombre' => 'Laos',
                    'name' => 'Laos',
                    'nom' => 'Laos'
                ),
                array(
                    'id' => 122, 
                    'iso' => 'LS', 
                    'nombre' => 'Lesotho',
                    'name' => 'Lesotho',
                    'nom' => 'Lesotho'
                ),
                array(
                    'id' => 123, 
                    'iso' => 'LV', 
                    'nombre' => 'Letonia',
                    'name' => 'Latvia',
                    'nom' => 'Lettonie'
                ),
                array(
                    'id' => 124, 
                    'iso' => 'LB', 
                    'nombre' => 'L??bano',
                    'name' => 'Lebanon',
                    'nom' => 'Liban'
                ),
                array(
                    'id' => 125, 
                    'iso' => 'LR', 
                    'nombre' => 'Liberia',
                    'name' => 'Liberia',
                    'nom' => 'Lib??ria'
                ),
                array(
                    'id' => 126, 
                    'iso' => 'LY', 
                    'nombre' => 'Libia',
                    'name' => 'Libya',
                    'nom' => 'Libye'
                ),
                array(
                    'id' => 127, 
                    'iso' => 'LI', 
                    'nombre' => 'Liechtenstein',
                    'name' => 'Liechtenstein',
                    'nom' => 'Liechtenstein'
                ),
                array(
                    'id' => 128, 
                    'iso' => 'LT', 
                    'nombre' => 'Lituania',
                    'name' => 'Lithuania',
                    'nom' => 'Lituanie'
                ),
                array(
                    'id' => 129, 
                    'iso' => 'LU', 
                    'nombre' => 'Luxemburgo',
                    'name' => 'Luxembourg',
                    'nom' => 'Luxembourg'
                ),
                array(
                    'id' => 130, 
                    'iso' => 'MO', 
                    'nombre' => 'Macao',
                    'name' => 'Macau',
                    'nom' => 'Macao'
                ),
                array(
                    'id' => 131, 
                    'iso' => 'MK', 
                    'nombre' => 'ARY Macedonia',
                    'name' => 'ARY Macedonia',
                    'nom' => 'ARY Macedonia'
                ),
                array(
                    'id' => 132, 
                    'iso' => 'MG', 
                    'nombre' => 'Madagascar',
                    'name' => 'Madagascar',
                    'nom' => 'Madagascar'
                ),
                array(
                    'id' => 133, 
                    'iso' => 'MY', 
                    'nombre' => 'Malasia',
                    'name' => 'Malaysia',
                    'nom' => 'Malaisie'
                ),
                array(
                    'id' => 134, 
                    'iso' => 'MW', 
                    'nombre' => 'Malawi',
                    'name' => 'Malawi',
                    'nom' => 'Malawi'
                ),
                array(
                    'id' => 135, 
                    'iso' => 'MV', 
                    'nombre' => 'Maldivas',
                    'name' => 'Maldives',
                    'nom' => 'Maldives'
                ),
                array(
                    'id' => 136, 
                    'iso' => 'ML', 
                    'nombre' => 'Mal??',
                    'name' => 'Mali',
                    'nom' => 'Mali'
                ),
                array(
                    'id' => 137, 
                    'iso' => 'MT', 
                    'nombre' => 'Malta',
                    'name' => 'Malta',
                    'nom' => 'Malte'
                ),
                array(
                    'id' => 138, 
                    'iso' => 'FK', 
                    'nombre' => 'Islas Malvinas',
                    'name' => 'Falkland Islands',
                    'nom' => '??les Malouines'
                ),
                array(
                    'id' => 139, 
                    'iso' => 'MP', 
                    'nombre' => 'Islas Marianas del Norte',
                    'name' => 'Northern Mariana Islands',
                    'nom' => '??les Mariannes du Nord'
                ),
                array(
                    'id' => 140, 
                    'iso' => 'MA', 
                    'nombre' => 'Marruecos',
                    'name' => 'Morocco',
                    'nom' => 'Maroc'
                ),
                array(
                    'id' => 141, 
                    'iso' => 'MH', 
                    'nombre' => 'Islas Marshall',
                    'name' => 'Marshall Islands',
                    'nom' => '??les Marshall'
                ),
                array(
                    'id' => 142, 
                    'iso' => 'MQ', 
                    'nombre' => 'Martinica',
                    'name' => 'Martinique',
                    'nom' => 'Martinique'
                ),
                array(
                    'id' => 143, 
                    'iso' => 'MU', 
                    'nombre' => 'Mauricio',
                    'name' => 'Mauritius',
                    'nom' => 'Maurice'
                ),
                array(
                    'id' => 144, 
                    'iso' => 'MR', 
                    'nombre' => 'Mauritania',
                    'name' => 'Mauritania',
                    'nom' => 'Mauritanie'
                ),
                array(
                    'id' => 145, 
                    'iso' => 'YT', 
                    'nombre' => 'Mayotte',
                    'name' => 'Mayotte',
                    'nom' => 'Mayotte'
                ),
                array(
                    'id' => 146, 
                    'iso' => 'MX', 
                    'nombre' => 'M??xico',
                    'name' => 'Mexico',
                    'nom' => 'Mexique'
                ),
                array(
                    'id' => 147, 
                    'iso' => 'FM', 
                    'nombre' => 'Micronesia',
                    'name' => 'Micronesia',
                    'nom' => 'Micron??sie'
                ),
                array(
                    'id' => 148, 
                    'iso' => 'MD', 
                    'nombre' => 'Moldavia',
                    'name' => 'Moldova',
                    'nom' => 'Moldavie'
                ),
                array(
                    'id' => 149, 
                    'iso' => 'MC', 
                    'nombre' => 'M??naco',
                    'name' => 'Monaco',
                    'nom' => 'Monaco'
                ),
                array(
                    'id' => 150, 
                    'iso' => 'MN', 
                    'nombre' => 'Mongolia',
                    'name' => 'Mongolia',
                    'nom' => 'Mongolie'
                ),
                array(
                    'id' => 151, 
                    'iso' => 'MS', 
                    'nombre' => 'Montserrat',
                    'name' => 'Montserrat',
                    'nom' => 'Montserrat'
                ),
                array(
                    'id' => 152, 
                    'iso' => 'MZ', 
                    'nombre' => 'Mozambique',
                    'name' => 'Mozambique',
                    'nom' => 'Mozambique'
                ),
                array(
                    'id' => 153, 
                    'iso' => 'MM', 
                    'nombre' => 'Myanmar',
                    'name' => 'Myanmar',
                    'nom' => 'Myanmar'
                ),
                array(
                    'id' => 154, 
                    'iso' => 'NA', 
                    'nombre' => 'Namibia',
                    'name' => 'Namibia',
                    'nom' => 'Namibia'
                ),
                array(
                    'id' => 155, 
                    'iso' => 'NR', 
                    'nombre' => 'Nauru',
                    'name' => 'Nauru',
                    'nom' => 'Nauru'
                ),
                array(
                    'id' => 156, 
                    'iso' => 'NP', 
                    'nombre' => 'Nepal',
                    'name' => 'Nepal',
                    'nom' => 'N??pal'
                ),
                array(
                    'id' => 157, 
                    'iso' => 'NI', 
                    'nombre' => 'Nicaragua',
                    'name' => 'Nicaragua',
                    'nom' => 'Nicaragua'
                ),
                array(
                    'id' => 158, 
                    'iso' => 'NE', 
                    'nombre' => 'N??ger',
                    'name' => 'Niger',
                    'nom' => 'Niger'
                ),
                array(
                    'id' => 159, 
                    'iso' => 'NG', 
                    'nombre' => 'Nigeria',
                    'name' => 'Nigeria',
                    'nom' => 'Nig??ria'
                ),
                array(
                    'id' => 160, 
                    'iso' => 'NU', 
                    'nombre' => 'Niue',
                    'name' => 'Niue',
                    'nom' => 'Niue'
                ),
                array(
                    'id' => 161, 
                    'iso' => 'NF', 
                    'nombre' => 'Isla Norfolk',
                    'name' => 'Norfolk Island',
                    'nom' => '??le Norfolk'
                ),
                array(
                    'id' => 162, 
                    'iso' => 'NO', 
                    'nombre' => 'Noruega',
                    'name' => 'Norway',
                    'nom' => 'Norv??ge'
                ),
                array(
                    'id' => 163, 
                    'iso' => 'NC', 
                    'nombre' => 'Nueva Caledonia',
                    'name' => 'New Caledonia',
                    'nom' => 'Nouvelle-Cal??donie'
                ),
                array(
                    'id' => 164, 
                    'iso' => 'NZ', 
                    'nombre' => 'Nueva Zelanda',
                    'name' => 'New Zealand',
                    'nom' => 'Nouvelle-Z??lande'
                ),
                array(
                    'id' => 165, 
                    'iso' => 'OM', 
                    'nombre' => 'Om??n',
                    'name' => 'Oman',
                    'nom' => 'Oman'
                ),
                array(
                    'id' => 166, 
                    'iso' => 'NL', 
                    'nombre' => 'Pa??ses Bajos',
                    'name' => 'The Netherlands',
                    'nom' => 'Pays Bas'
                ),
                array(
                    'id' => 167, 
                    'iso' => 'PK', 
                    'nombre' => 'Pakist??n',
                    'name' => 'Pakistan',
                    'nom' => 'Pakistan'
                ),
                array(
                    'id' => 168, 
                    'iso' => 'PW', 
                    'nombre' => 'Palau',
                    'name' => 'Palau',
                    'nom' => 'Palaos'
                ),
                array(
                    'id' => 169, 
                    'iso' => 'PS', 
                    'nombre' => 'Palestina',
                    'name' => 'Palestine',
                    'nom' => 'Palestine'
                ),
                array(
                    'id' => 170, 
                    'iso' => 'PA', 
                    'nombre' => 'Panam??',
                    'name' => 'Panama',
                    'nom' => 'Panama'
                ),
                array(
                    'id' => 171, 
                    'iso' => 'PG', 
                    'nombre' => 'Pap??a Nueva Guinea',
                    'name' => 'Papua New Guinea',
                    'nom' => 'Papouasie Nouvelle Guin??e'
                ),
                array(
                    'id' => 172, 
                    'iso' => 'PY', 
                    'nombre' => 'Paraguay',
                    'name' => 'Paraguay',
                    'nom' => 'Paraguay'
                ),
                array(
                    'id' => 173, 
                    'iso' => 'PE', 
                    'nombre' => 'Per??',
                    'name' => 'Peru',
                    'nom' => 'P??rou'
                ),
                array(
                    'id' => 174, 
                    'iso' => 'PN', 
                    'nombre' => 'Islas Pitcairn',
                    'name' => 'Pitcairn Islands',
                    'nom' => '??les Pitcairn'
                ),
                array(
                    'id' => 175, 
                    'iso' => 'PF', 
                    'nombre' => 'Polinesia Francesa',
                    'name' => 'French Polynesia',
                    'nom' => 'Polyn??sie fran??aise'
                ),
                array(
                    'id' => 176, 
                    'iso' => 'PL', 
                    'nombre' => 'Polonia',
                    'name' => 'Poland',
                    'nom' => 'Pologne'
                ),
                array(
                    'id' => 177, 
                    'iso' => 'PT', 
                    'nombre' => 'Portugal',
                    'name' => 'Portugal',
                    'nom' => 'Portugal'
                ),
                array(
                    'id' => 178, 
                    'iso' => 'PR', 
                    'nombre' => 'Puerto Rico',
                    'name' => 'Puerto Rico',
                    'nom' => 'Porto Rico'
                ),
                array(
                    'id' => 179, 
                    'iso' => 'QA', 
                    'nombre' => 'Qatar',
                    'name' => 'Qatar',
                    'nom' => 'Qatar'
                ),
                array(
                    'id' => 180, 
                    'iso' => 'GB', 
                    'nombre' => 'Reino Unido',
                    'name' => 'United Kingdom',
                    'nom' => 'Royaume Uni'
                ),
                array(
                    'id' => 181, 
                    'iso' => 'RE', 
                    'nombre' => 'Reuni??n',
                    'name' => 'Reunion',
                    'nom' => 'Rassemblement'
                ),
                array(
                    'id' => 182, 
                    'iso' => 'RW', 
                    'nombre' => 'Ruanda',
                    'name' => 'Rwanda',
                    'nom' => 'Rwanda'
                ),
                array(
                    'id' => 183, 
                    'iso' => 'RO', 
                    'nombre' => 'Rumania',
                    'name' => 'Romania',
                    'nom' => 'Roumanie'
                ),
                array(
                    'id' => 184, 
                    'iso' => 'RU', 
                    'nombre' => 'Rusia',
                    'name' => 'Russia',
                    'nom' => 'Russie'
                ),
                array(
                    'id' => 185, 
                    'iso' => 'EH', 
                    'nombre' => 'Sahara Occidental',
                    'name' => 'Western Sahara',
                    'nom' => 'Sahara Occidental'
                ),
                array(
                    'id' => 186, 
                    'iso' => 'SB', 
                    'nombre' => 'Islas Salom??n',
                    'name' => 'Solomon Islands',
                    'nom' => '??les Salomon'
                ),
                array(
                    'id' => 187, 
                    'iso' => 'WS', 
                    'nombre' => 'Samoa',
                    'name' => 'Samoa',
                    'nom' => 'Samoa'
                ),
                array(
                    'id' => 188, 
                    'iso' => 'AS', 
                    'nombre' => 'Samoa Americana',
                    'name' => 'American Samoa',
                    'nom' => 'Samoa am??ricaines'
                ),
                array(
                    'id' => 189, 
                    'iso' => 'KN', 
                    'nombre' => 'San Crist??bal y Nevis',
                    'name' => 'Saint Kitts and Nevis',
                    'nom' => 'Saint-Christophe-et-Nevis'
                ),
                array(
                    'id' => 190, 
                    'iso' => 'SM', 
                    'nombre' => 'San Marino',
                    'name' => 'San Marino',
                    'nom' => 'Saint-Marin'
                ),
                array(
                    'id' => 191, 
                    'iso' => 'PM', 
                    'nombre' => 'San Pedro y Miquel??n',
                    'name' => 'Saint Pierre and Miquelon',
                    'nom' => 'Saint Pierre et Miquelon'
                ),
                array(
                    'id' => 192, 
                    'iso' => 'VC', 
                    'nombre' => 'San Vicente y las Granadinas',
                    'name' => 'Saint Vincent And The Grenadines',
                    'nom' => 'Saint-Vincent-et-les Grenadines'
                ),
                array(
                    'id' => 193, 
                    'iso' => 'SH', 
                    'nombre' => 'Santa Helena',
                    'name' => 'St. Helena',
                    'nom' => 'Sainte H??l??ne'
                ),
                array(
                    'id' => 194, 
                    'iso' => 'LC', 
                    'nombre' => 'Santa Luc??a',
                    'name' => 'Saint Lucia',
                    'nom' => 'Sainte-Lucie'
                ),
                array(
                    'id' => 195, 
                    'iso' => 'ST', 
                    'nombre' => 'Santo Tom?? y Pr??ncipe',
                    'name' => 'Sao Tome and Principe',
                    'nom' => 'Sao Tom??-et-Principe'
                ),
                array(
                    'id' => 196, 
                    'iso' => 'SN', 
                    'nombre' => 'Senegal',
                    'name' => 'Senegal',
                    'nom' => 'S??n??gal'
                ),
                array(
                    'id' => 197, 
                    'iso' => 'CS', 
                    'nombre' => 'Serbia y Montenegro',
                    'name' => 'Serbia and Montenegro',
                    'nom' => 'Serbie-et-Mont??n??gro'
                ),
                array(
                    'id' => 198, 
                    'iso' => 'SC', 
                    'nombre' => 'Seychelles',
                    'name' => 'Seychelles',
                    'nom' => 'Seychelles'
                ),
                array(
                    'id' => 199, 
                    'iso' => 'SL', 
                    'nombre' => 'Sierra Leona',
                    'name' => 'Sierra Leone',
                    'nom' => 'Sierra Leone'
                ),
                array(
                    'id' => 200, 
                    'iso' => 'SG', 
                    'nombre' => 'Singapur',
                    'name' => 'Singapore',
                    'nom' => 'Singapour'
                ),
                array(
                    'id' => 201, 
                    'iso' => 'SY', 
                    'nombre' => 'Siria',
                    'name' => 'Syria',
                    'nom' => 'Syrie'
                ),
                array(
                    'id' => 202, 
                    'iso' => 'SO', 
                    'nombre' => 'Somalia',
                    'name' => 'Somalia',
                    'nom' => 'Somalie'
                ),
                array(
                    'id' => 203, 
                    'iso' => 'LK', 
                    'nombre' => 'Sri Lanka',
                    'name' => 'Sri Lanka',
                    'nom' => 'Sri Lanka'
                ),
                array(
                    'id' => 204, 
                    'iso' => 'SZ', 
                    'nombre' => 'Suazilandia',
                    'name' => 'Swaziland',
                    'nom' => 'Swaziland'
                ),
                array(
                    'id' => 205, 
                    'iso' => 'ZA', 
                    'nombre' => 'Sud??frica',
                    'name' => 'South Africa',
                    'nom' => 'Afrique du Sud'
                ),
                array(
                    'id' => 206, 
                    'iso' => 'SD', 
                    'nombre' => 'Sud??n',
                    'name' => 'Sudan',
                    'nom' => 'Soudan'
                ),
                array(
                    'id' => 207, 
                    'iso' => 'SE', 
                    'nombre' => 'Suecia',
                    'name' => 'Sweden',
                    'nom' => 'Su??de'
                ),
                array(
                    'id' => 208, 
                    'iso' => 'CH', 
                    'nombre' => 'Suiza',
                    'name' => 'Switzerland',
                    'nom' => 'Suisse'
                ),
                array(
                    'id' => 209, 
                    'iso' => 'SR', 
                    'nombre' => 'Surinam',
                    'name' => 'Suriname',
                    'nom' => 'Suriname'
                ),
                array(
                    'id' => 210, 
                    'iso' => 'SJ', 
                    'nombre' => 'Svalbard y Jan Mayen',
                    'name' => 'Svalbard and Jan Mayen',
                    'nom' => 'Svalbard et Jan Mayen'
                ),
                array(
                    'id' => 211, 
                    'iso' => 'TH', 
                    'nombre' => 'Tailandia',
                    'name' => 'Thailand',
                    'nom' => 'Tha??lande'
                ),
                array(
                    'id' => 212, 
                    'iso' => 'TW', 
                    'nombre' => 'Taiw??n',
                    'name' => 'Taiwan',
                    'nom' => 'Ta??wan'
                ),
                array(
                    'id' => 213, 
                    'iso' => 'TZ', 
                    'nombre' => 'Tanzania',
                    'name' => 'Tanzania',
                    'nom' => 'Tanzanie'
                ),
                array(
                    'id' => 214, 
                    'iso' => 'TJ', 
                    'nombre' => 'Tayikist??n',
                    'name' => 'Tajikistan',
                    'nom' => 'Tadjikistan'
                ),
                array(
                    'id' => 215, 
                    'iso' => 'IO', 
                    'nombre' => 'Territorio Brit??nico del Oc??ano ??ndico',
                    'name' => 'British Indian Ocean Territory',
                    'nom' => "Territoire britannique de l'oc??an Indien"
                ),
                array(
                    'id' => 216, 
                    'iso' => 'TF', 
                    'nombre' => 'Territorios Australes Franceses',
                    'name' => 'French Southern Territories',
                    'nom' => 'Territoires Austraux Fran??ais'
                ),
                array(
                    'id' => 217, 
                    'iso' => 'TL', 
                    'nombre' => 'Timor Oriental',
                    'name' => 'East Timor',
                    'nom' => 'Timor oriental'
                ),
                array(
                    'id' => 218, 
                    'iso' => 'TG', 
                    'nombre' => 'Togo',
                    'name' => 'Togo',
                    'nom' => 'Togo'
                ),
                array(
                    'id' => 219, 
                    'iso' => 'TK', 
                    'nombre' => 'Tokelau',
                    'name' => 'Tokelau',
                    'nom' => 'Tok??laou'
                ),
                array(
                    'id' => 220, 
                    'iso' => 'TO', 
                    'nombre' => 'Tonga',
                    'name' => 'Tonga',
                    'nom' => 'Tonga'
                ),
                array(
                    'id' => 221, 
                    'iso' => 'TT', 
                    'nombre' => 'Trinidad y Tobago',
                    'name' => 'Trinidad and Tobago',
                    'nom' => 'Trinit??-et-Tobago'
                ),
                array(
                    'id' => 222, 
                    'iso' => 'TN', 
                    'nombre' => 'T??nez',
                    'name' => 'Tunisia',
                    'nom' => 'Tunisie'
                ),
                array(
                    'id' => 223, 
                    'iso' => 'TC', 
                    'nombre' => 'Islas Turcas y Caicos',
                    'name' => 'Turks and Caicos Islands',
                    'nom' => '??les Turques et Ca??ques'
                ),
                array(
                    'id' => 224, 
                    'iso' => 'TM', 
                    'nombre' => 'Turkmenist??n',
                    'name' => 'Turkmenistan',
                    'nom' => 'Turkm??nistan'
                ),
                array(
                    'id' => 225, 
                    'iso' => 'TR', 
                    'nombre' => 'Turqu??a',
                    'name' => 'Turkey',
                    'nom' => 'Turquie'
                ),
                array(
                    'id' => 226, 
                    'iso' => 'TV', 
                    'nombre' => 'Tuvalu',
                    'name' => 'Tuvalu',
                    'nom' => 'Tuvalu'
                ),
                array(
                    'id' => 227, 
                    'iso' => 'UA', 
                    'nombre' => 'Ucrania',
                    'name' => 'Ukraine',
                    'nom' => 'Ukraine'
                ),
                array(
                    'id' => 228, 
                    'iso' => 'UG', 
                    'nombre' => 'Uganda',
                    'name' => 'Uganda',
                    'nom' => 'Ouganda'
                ),
                array(
                    'id' => 229, 
                    'iso' => 'UY', 
                    'nombre' => 'Uruguay',
                    'name' => 'Uruguay',
                    'nom' => 'Uruguay'
                ),
                array(
                    'id' => 230, 
                    'iso' => 'UZ', 
                    'nombre' => 'Uzbekist??n',
                    'name' => 'Uzbekistan',
                    'nom' => 'Ouzb??kistan'
                ),
                array(
                    'id' => 231, 
                    'iso' => 'VU', 
                    'nombre' => 'Vanuatu',
                    'name' => 'Vanuatu',
                    'nom' => 'Vanuatu'
                ),
                array(
                    'id' => 232, 
                    'iso' => 'VE', 
                    'nombre' => 'Venezuela',
                    'name' => 'Venezuela',
                    'nom' => 'Venezuela'
                ),
                array(
                    'id' => 233, 
                    'iso' => 'VN', 
                    'nombre' => 'Vietnam',
                    'name' => 'Vietnam',
                    'nom' => 'Vietnam'
                ),
                array(
                    'id' => 234, 
                    'iso' => 'VG', 
                    'nombre' => 'Islas V??rgenes Brit??nicas',
                    'name' => 'British Virgin Islands',
                    'nom' => '??les Vierges britanniques'
                ),
                array(
                    'id' => 235, 
                    'iso' => 'VI', 
                    'nombre' => 'Islas V??rgenes de los Estados Unidos',
                    'name' => 'United States Virgin Islands',
                    'nom' => '??les Vierges des ??tats-Unis'
                ),
                array(
                    'id' => 236, 
                    'iso' => 'WF', 
                    'nombre' => 'Wallis y Futuna',
                    'name' => 'Wallis and Futuna',
                    'nom' => 'Wallis et Futuna'
                ),
                array(
                    'id' => 237, 
                    'iso' => 'YE', 
                    'nombre' => 'Yemen',
                    'name' => 'Yemen',
                    'nom' => 'Y??men'
                ),
                array(
                    'id' => 238, 
                    'iso' => 'DJ', 
                    'nombre' => 'Yibuti',
                    'name' => 'Djibouti',
                    'nom' => 'Djibouti'
                ),
                array(
                    'id' => 239, 
                    'iso' => 'ZM', 
                    'nombre' => 'Zambia',
                    'name' => 'Zambia',
                    'nom' => 'Zambie'
                ),
                array(
                    'id' => 240, 
                    'iso' => 'ZW', 
                    'nombre' => 'Zimbabue',
                    'name' => 'Zimbabwe',
                    'nom' => 'Zimbabwe'
                ),
            ];
    
            foreach ($paises as $key => $value) {
                $id = $value['id'];
                $iso = $value['iso'];
                $nombre = $value['nombre'];
                $name = $value['name'];
                $nom = $value['nom'];
    
                $sql4 = "INSERT INTO `{$wpdb->prefix}paises` (`id`, `iso`, `es`, `en`, `fr`) VALUES ('$id','$iso','$nombre', '$name', '$nom');";
                $wpdb->query($sql4);
            }
    
            $sql5 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}weights_air` (
                `aid` int(11) NOT NULL AUTO_INCREMENT,
                `weight_detalle` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
                PRIMARY KEY (`aid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";     
            $wpdb->query($sql5);
    
            $sql6 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}rates_air` (
                `aid` int(11) NOT NULL AUTO_INCREMENT,
                `rate_country` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
                PRIMARY KEY (`aid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";     
            $wpdb->query($sql6);        
    
            $sql7 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}rates_maritime` (
                `aid` int(11) NOT NULL AUTO_INCREMENT,
                `rate_country` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
                PRIMARY KEY (`aid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";     
            $wpdb->query($sql7); 
    
            $sql8 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}rates_country` (
                `aid` int(11) NOT NULL AUTO_INCREMENT,
                `rate_country` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
                PRIMARY KEY (`aid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";     
            $wpdb->query($sql8); 
    
            $sql9 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}weights_maritime` (
                `aid` int(11) NOT NULL AUTO_INCREMENT,
                `weight_detalle` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
                PRIMARY KEY (`aid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";     
            $wpdb->query($sql9);
        }

        function deactivated(){
            global $wpdb;    
            
            $sql = "DROP TABLE `{$wpdb->prefix}cotizacion`";
            $wpdb->query($sql);
    
            $sql2 = "DROP TABLE `{$wpdb->prefix}cotizacion_detalle`";
            $wpdb->query($sql2);
    
            $sql3 = "DROP TABLE `{$wpdb->prefix}paises`";
            $wpdb->query($sql3);
    
            $sql4 = "DROP TABLE `{$wpdb->prefix}weights_air`";
            $wpdb->query($sql4);
    
            $sql5 = "DROP TABLE `{$wpdb->prefix}rates_air`";
            $wpdb->query($sql5);
    
            $sql6 = "DROP TABLE `{$wpdb->prefix}rates_maritime`";
            $wpdb->query($sql6);
    
            $sql7 = "DROP TABLE `{$wpdb->prefix}rates_country`";
            $wpdb->query($sql7);
    
            $sql8 = "DROP TABLE `{$wpdb->prefix}weights_maritime`";
            $wpdb->query($sql8);
    
        }
    }
?>