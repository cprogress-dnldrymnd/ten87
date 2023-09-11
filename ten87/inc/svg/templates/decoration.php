<?php
$rotation_amount = rand(0, 360);
$styles          = array();

if ( '' !== $rotation_amount ) {
    $styles[] = 'transform: rotate(' . $rotation_amount . 'deg)';
}
?>

<svg class="<?php echo esc_attr( $class ); ?>" <?php qode_framework_inline_style( $styles ); ?> width="38" height="52" viewBox="0 0 38 52" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.483 1C17.483 13.8029 17.7936 26.5312 16.369 39.2184C15.933 43.1009 15.6546 47.2607 14.7598 51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M1 37.1105C5.67462 34.8411 10.3873 32.6431 15.0732 30.3952C20.824 27.6364 26.9817 25.0936 32.3431 21.6047C32.5833 21.4484 37.1618 18.0143 36.7483 17.8066C36.2281 17.5454 35.275 17.7283 34.6821 17.7283" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M23.0143 44.0547C19.4703 40.9172 16.9445 36.356 14.684 32.2877C12.7622 28.829 10.5655 25.4949 8.73932 21.9868C8.20483 20.96 7.87891 20.1904 7.87891 19.0547" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M9.25488 41.2769C17.3856 29.2209 26.1084 17.7177 35.3979 6.55469" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
