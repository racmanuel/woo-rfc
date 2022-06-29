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
    # Custom Field: Checkbox
    woocommerce_form_field('woo_rfc_check', array(
        'type' => 'checkbox',
        'id' => 'woo_rfc_check',
        'class' => array('form-row input', 'form-row', 'hidden'),
        'label' => __('¿Necesitas Factura Fiscal?', 'woo-rfc'),
        'description' => __('Valido solo para México.', 'woo-rfc'),
        'required' => false,
    ));

    # Custom Field: RFC
    woocommerce_form_field('woo_rfc', array(
        'type' => 'text',
        'id' => 'woo_rfc',
        'class' => array('form-row input', 'form-row', 'hidden'),
        'label' => __('RFC', 'woo-rfc'),
        'description' => __('Inserta tu RFC de 13  Digitos.', 'woo-rfc'),
        'required' => true,
        'maxlength' => '13',
    ));

    # Custom Field: Select 1 - Persona - Fisca - Moral
    woocommerce_form_field('woo_rfc_fm', array(
        'type' => 'select',
        'id' => 'woo_rfc_fm',
        'class' => array('form-row', 'form-row', 'hidden'),
        'label' => __('¿Eres persona física o moral?', 'woo-rfc'),
        'required' => true,
        'options' => array(
            '' => 'Seleccione una opcion',
            'Persona Moral' => 'Moral',
            'Persona Fisica' => 'Fisica',
        ),
    ));

    # Custom Field: Select 2 - Regimen Fiscal
    woocommerce_form_field('woo_rfc_regimen', array(
        'type' => 'select',
        'id' => 'woo_rfc_regimen',
        'class' => array('form-row input', 'form-row', 'hidden'),
        'label' => __('Selecciona un uso de Regimen Fiscal.'),
        'required' => true,
        'options' => woo_rfc_array_regimen($REGIMEN),
        'default' => '0'));

    # Custom Field: Select 3 - CFDI
    woocommerce_form_field('woo_rfc_cfdi', array(
        'type' => 'select',
        'id' => 'woo_rfc_cfdi',
        'class' => array('form-row input', 'form-row', 'hidden'),
        'label' => __('Selecciona un uso de CFDI.'),
        'required' => true,
        'options' => woo_rfc_array_cfdi($CFDI),
        'default' => '0'));
}

add_action('woocommerce_after_checkout_billing_form', 'woo_rfc_custom_fields');

function woo_rfc_array_regimen()
{

    $REGIMEN = array(
        0 => 'Selecciona una Opcion',
        1 => '601 - General de Ley Personas Morales',
        2 => '603 - Personas Morales con Fines no Lucrativos',
        3 => '605 - Sueldos y Salarios e Ingresos Asimilados a Salarios',
        4 => '606 - Arrendamiento',
        5 => '607 - Regimen de Enajenacion o Adquisicion de Bienes',
        6 => '608 - Demas ingresos',
        7 => '609 - Consolidacion',
        8 => '610 - Residentes en el Extranjero sin Establecimiento Permanente en México',
        9 => '611 - Ingresos por Dividendos (socios y accionistas)',
        10 => '612 - Personas Fisicas con Actividades Empresariales y Profesionales',
        11 => '614 - Ingresos por intereses',
        12 => '615 - Regimen de los ingresos por obtencion de premios',
        13 => '616 - Sin obligaciones fiscales',
        14 => '620 - Sociedades Cooperativas de Produccion que optan por diferir sus ingresos',
        15 => '621 - Incorporacion Fiscal',
        16 => '622 - Actividades Agricolas, Ganaderas, Silvi­colas y Pesqueras',
        17 => '623 - Opcional para Grupos de Sociedades',
        18 => '624 - Coordinados',
        19 => '625 - Regimen de las Actividades Empresariales con ingresos a traves de Plataformas Tecnologicas',
        20 => '626 - Regimen Simplificado de Confianza',
        21 => '628 - Hidrocarburos',
        22 => '629 - De los Regi­menes Fiscales Preferentes y de las Empresas Multinacionales',
        23 => '630 - Enajenacion de acciones en bolsa de valores',
    );
    return $REGIMEN;
}

function woo_rfc_array_cfdi()
{
    $CFDI = array(
        0 => 'Selecciona una Opcion',
        1 => 'G01 - Adquisicion de mercancias',
        2 => 'G02 - Devoluciones, descuentos o bonificaciones',
        3 => 'G03 - Gastos en general',
        4 => 'I01 - Construcciones',
        5 => 'I02 - Mobiliario y equipo de oficina por inversiones',
        6 => 'I03 - Equipo de transporte',
        7 => 'I04 - Equipo de computo y accesorios',
        8 => 'I05 - Dados, troqueles, moldes, matrices y herramental',
        9 => 'I06 - Comunicaciones telefonicas',
        10 => 'I07 - Comunicaciones satelitales',
        11 => 'I08 - Otra maquinaria y equipo',
        12 => 'D01 - Honorarios medicos, dentales y gastos hospitalarios.',
        13 => 'D02 - Gastos medicos por incapacidad o discapacidad',
        14 => 'D03 - Gastos funerales.',
        15 => 'D04 - Donativos.',
        16 => 'D05 - Intereses reales efectivamente pagados por creditos hipotecarios (casa habitacion).',
        17 => 'D06 - Aportaciones voluntarias al SAR.',
        18 => 'D07 - Primas por seguros de gastos medicos.',
        19 => 'D08 - Gastos de transportacion escolar obligatoria.',
        20 => 'D09 - Depositos en cuentas para el ahorro, primas que tengan como base planes de pensiones.',
        21 => 'D10 - Pagos por servicios educativos (colegiaturas)',
        22 => 'P01 - Por definir',
    );
    return $CFDI;
}
