<?php
/**
 * Make a Custom Fields
 */

defined('ABSPATH') || exit;

/**
 * Funtion to Make a Custom Fields
 *
 * Funtion to Make a Custom Fields in WooCommerce Checkout.
 *
 * @param Type $var Description
 * @return type
 * @throws conditon
 **/
function woo_rfc_custom_fields()
{
    # code...

    # Custom Field: Check ¿Do you need a Invoice?
    woocommerce_form_field('woo_rfc_check', array(
        'type' => 'checkbox',
        'class' => array('woo_rfc_check', 'form-row input', 'form-row'),
        'label' => __('¿Necesitas Factura Fiscal?', 'woo-rfc'),
        'description' => __('Valido solo para México.', 'woo-rfc'),
        'required' => false,
    ));

    # Custom Field: RFC
    woocommerce_form_field('woo_rfc', array(
        'type' => 'text',
        'class' => array('woo_rfc', 'form-row input', 'form-row', 'hidden'),
        'label' => __('RFC', 'woo-rfc'),
        'description' => __('Inserta tu RFC de 13  Digitos.', 'woo-rfc'),
        'required' => true,
        'maxlength' => '13',
    ));

    # Custom Field: Regimen Fiscal
    woocommerce_form_field('woo_rfc_regimen', array(
        'type' => 'select',
        'class' => array('woo_rfc_regimen', 'form-row input', 'form-row', 'hidden'),
        'label' => __('Selecciona un uso de Regimen Fiscal.'),
        'required' => true,
        'options' => array (
            0 => '601 - General de Ley Personas Morales',
            1 => '603 - Personas Morales con Fines no Lucrativos',
            2 => '605 - Sueldos y Salarios e Ingresos Asimilados a Salarios',
            3 => '606 - Arrendamiento',
            4 => '607 - Regimen de Enajenacion o Adquisicion de Bienes',
            5 => '608 - Demas ingresos',
            6 => '609 - Consolidacion',
            7 => '610 - Residentes en el Extranjero sin Establecimiento Permanente en México',
            8 => '611 - Ingresos por Dividendos (socios y accionistas)',
            9 => '612 - Personas Fisicas con Actividades Empresariales y Profesionales',
            10 => '614 - Ingresos por intereses',
            11 => '615 - Regimen de los ingresos por obtencion de premios',
            12 => '616 - Sin obligaciones fiscales',
            13 => '620 - Sociedades Cooperativas de Produccion que optan por diferir sus ingresos',
            14 => '621 - Incorporacion Fiscal',
            15 => '622 - Actividades Agricolas, Ganaderas, Silvi­colas y Pesqueras',
            16 => '623 - Opcional para Grupos de Sociedades',
            17 => '624 - Coordinados',
            18 => '625 - Regimen de las Actividades Empresariales con ingresos a traves de Plataformas Tecnologicas',
            19 => '626 - Regimen Simplificado de Confianza',
            20 => '628 - Hidrocarburos',
            21 => '629 - De los Regi­menes Fiscales Preferentes y de las Empresas Multinacionales',
            22 => '630 - Enajenacion de acciones en bolsa de valores',
          ),
        'default' => '0'));

    # Custom Field: Uso de CFDI
    woocommerce_form_field('woo_rfc_cfdi', array(
        'type' => 'select',
        'class' => array('woo_rfc_cfdi', 'form-row input', 'form-row', 'hidden'),
        'label' => __('Selecciona un uso de CFDI.'),
        'required' => true,
        'options' => array(
            0 => 'G01 - Adquisicion de mercancias',
            1 => 'G02 - Devoluciones, descuentos o bonificaciones',
            2 => 'G03 - Gastos en general',
            3 => 'I01 - Construcciones',
            4 => 'I02 - Mobiliario y equipo de oficina por inversiones',
            5 => 'I03 - Equipo de transporte',
            6 => 'I04 - Equipo de computo y accesorios',
            7 => 'I05 - Dados, troqueles, moldes, matrices y herramental',
            8 => 'I06 - Comunicaciones telefÃ³nicas',
            9 => 'I07 - Comunicaciones satelitales',
            10 => 'I08 - Otra maquinaria y equipo',
            11 => 'D01 - Honorarios mÃ©dicos, dentales y gastos hospitalarios.',
            12 => 'D02 - Gastos mÃ©dicos por incapacidad o discapacidad',
            13 => 'D03 - Gastos funerales.',
            14 => 'D04 - Donativos.',
            15 => 'D05 - Intereses reales efectivamente pagados por creditos hipotecarios (casa habitacion).',
            16 => 'D06 - Aportaciones voluntarias al SAR.',
            17 => 'D07 - Primas por seguros de gastos medicos.',
            18 => 'D08 - Gastos de transportacion escolar obligatoria.',
            19 => 'D09 - Depositos en cuentas para el ahorro, primas que tengan como base planes de pensiones.',
            20 => 'D10 - Pagos por servicios educativos (colegiaturas)',
            21 => 'P01 - Por definir',
        ),
        'default' => '0'));
}

add_action('woocommerce_after_checkout_billing_form', 'woo_rfc_custom_fields');
