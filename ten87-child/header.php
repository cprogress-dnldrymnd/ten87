<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
	<?php
	// Hook to include default WordPress hook after body tag open
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}

	// Hook to include additional content after body tag open
	do_action('obsius_action_after_body_tag_open');
	?>
	<?php if (is_front_page()) { ?>
		<div class="home-cursor">
			<div class="inner">
				<svg class="text-svg" xmlns="http://www.w3.org/2000/svg" width="118" height="118" viewBox="0 0 118 118" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M56.5668 1.15298L56.4655 0L51.4314 0.440212L52.193 9.20989L57.2306 8.76966L57.1293 7.61668L53.3109 7.96606L53.0559 5.05915L56.462 4.76215L56.3642 3.60917L52.9546 3.90617L52.745 1.50237L56.5668 1.15298ZM49.943 9.58357L46.8548 6.54039L45.3945 6.86881L46.198 10.4396L45.0102 10.7086L43.0713 2.11713L46.2364 1.41835C46.5682 1.33407 46.9135 1.3167 47.252 1.36728C47.5906 1.41786 47.9157 1.53538 48.2084 1.71296C48.501 1.89054 48.7554 2.12462 48.9567 2.40157C49.1579 2.67851 49.302 2.99277 49.3806 3.326C49.5345 3.87414 49.4925 4.45884 49.2616 4.97929C49.0308 5.49974 48.6256 5.92333 48.1159 6.17703L51.3579 9.29008L49.943 9.58357ZM45.1394 5.74029L47.0888 5.30006C47.2735 5.26269 47.4488 5.1888 47.6046 5.08274C47.7603 4.97667 47.8933 4.84056 47.9957 4.6824C48.0982 4.52424 48.1679 4.3472 48.201 4.16169C48.2341 3.97618 48.2299 3.78595 48.1884 3.60212C48.147 3.41829 48.0693 3.24458 47.9599 3.09119C47.8504 2.93781 47.7115 2.80782 47.5511 2.70888C47.3908 2.60994 47.2123 2.54401 47.0261 2.51499C46.8399 2.48597 46.6498 2.49444 46.467 2.53988L44.5036 2.98011L45.1394 5.74029ZM42.4525 9.38714C42.6308 8.52728 42.5508 7.63387 42.2225 6.81938C42.0048 6.27162 41.6799 5.77282 41.267 5.35221C40.854 4.93161 40.3613 4.59765 39.8176 4.3699C39.274 4.14215 38.6903 4.02519 38.1009 4.02588C37.5114 4.02657 36.928 4.14491 36.3849 4.37393C35.5741 4.71125 34.8812 5.2809 34.3935 6.01115C33.9057 6.74139 33.6449 7.59961 33.6438 8.47777C33.6427 9.35593 33.9015 10.2148 34.3874 10.9462C34.8734 11.6777 35.5649 12.249 36.3748 12.5883C37.1848 12.9276 38.0771 13.0197 38.9393 12.853C39.8015 12.6864 40.5951 12.2684 41.2202 11.6516C41.8454 11.0349 42.2741 10.247 42.4525 9.38714ZM39.4068 11.6474C37.7334 12.3426 35.8818 11.5007 35.1482 9.75393L35.1342 9.73995C34.9737 9.34999 34.8915 8.93222 34.8923 8.5105C34.8932 8.08878 34.9772 7.67137 35.1394 7.28208C35.3016 6.8928 35.5389 6.53929 35.8377 6.24171C36.1365 5.94413 36.491 5.70831 36.881 5.54774C37.2709 5.38717 37.6887 5.305 38.1104 5.30588C38.5321 5.30676 38.9496 5.3907 39.3388 5.5529C39.7281 5.7151 40.0816 5.95237 40.3792 6.2512C40.6768 6.55002 40.9126 6.90454 41.0732 7.29449C41.8033 9.06221 41.0802 10.9522 39.4068 11.6474ZM88.2668 7.71391L87.7393 8.74461L84.3262 6.99767L83.2222 9.14292L86.2651 10.7082L85.7341 11.7563L82.6947 10.1911L81.3497 12.7626L84.7594 14.5095L84.2318 15.5367L79.7357 13.2238L83.7602 5.39746L88.2668 7.71391ZM89.6782 19.234L89.79 15.0414L85.8913 16.5717L84.7384 15.7611L89.8179 13.7836L89.9542 8.66502L91.1385 9.50005L91.0337 13.2979L94.5866 11.9213L95.7464 12.7389L91.0092 14.5767L90.852 20.0481L89.6782 19.234ZM99.2368 20.9066C99.5589 20.7638 99.8488 20.5572 100.089 20.2992C100.332 20.0451 100.522 19.7441 100.645 19.4146C100.769 19.085 100.824 18.7338 100.808 18.3822C100.792 18.0306 100.704 17.6859 100.55 17.3693C100.397 17.0526 100.18 16.7705 99.9141 16.5402L97.4687 14.2135L91.4144 20.6066L92.3018 21.445L94.7472 18.8598L96.3193 20.3481C96.5659 20.5998 96.861 20.7988 97.1868 20.9332C97.5125 21.0676 97.8622 21.1345 98.2145 21.1299C98.5669 21.1254 98.9146 21.0494 99.2368 20.9066ZM99.5234 18.9761C99.4538 19.1593 99.3478 19.3265 99.2119 19.4677C99.0776 19.6102 98.9161 19.7242 98.7369 19.8032C98.5577 19.8821 98.3645 19.9243 98.1688 19.9272C97.973 19.9301 97.7786 19.8938 97.5972 19.8202C97.4157 19.7467 97.2508 19.6375 97.1123 19.4992L95.5437 18.0144L97.5595 15.8869L99.1281 17.3716C99.2748 17.5015 99.3938 17.6597 99.4778 17.8367C99.5618 18.0138 99.6092 18.206 99.617 18.4018C99.6248 18.5976 99.593 18.793 99.5234 18.9761ZM104.127 21.0229L98.1674 25.813L100.875 29.1846L99.9735 29.9113L96.501 25.5859L103.359 20.0725L104.127 21.0229ZM105.906 35.9662C106.782 36.0293 107.657 35.832 108.421 35.399C108.935 35.1108 109.387 34.7228 109.749 34.2578C110.111 33.7929 110.377 33.2603 110.531 32.6912C110.685 32.1222 110.724 31.5281 110.645 30.9439C110.567 30.3596 110.372 29.797 110.073 29.2888C109.632 28.5298 108.975 27.9184 108.187 27.5315C107.399 27.1446 106.514 26.9996 105.643 27.1146C104.773 27.2297 103.955 27.5997 103.295 28.1781C102.634 28.7565 102.159 29.5174 101.93 30.365C101.701 31.2127 101.727 32.1093 102.006 32.9419C102.286 33.7745 102.805 34.5059 103.499 35.044C104.193 35.5821 105.03 35.903 105.906 35.9662ZM103.268 33.254C102.356 31.6889 102.926 29.743 104.578 28.7823H104.585C104.949 28.5541 105.356 28.4014 105.78 28.3334C106.205 28.2654 106.639 28.2835 107.056 28.3866C107.474 28.4897 107.866 28.6756 108.21 28.9334C108.554 29.1911 108.843 29.5154 109.059 29.887C109.276 30.2586 109.415 30.6699 109.469 31.0964C109.523 31.5229 109.491 31.956 109.374 32.3698C109.258 32.7837 109.059 33.1698 108.79 33.5054C108.521 33.8409 108.188 34.1189 107.809 34.323C106.15 35.2837 104.18 34.8191 103.268 33.254ZM106.716 43.4221L109.333 39.9527L108.812 38.5551L105.382 39.8304L104.955 38.6844L113.207 35.6167L114.335 38.66C114.464 38.9775 114.529 39.3176 114.525 39.6604C114.52 40.0032 114.448 40.3417 114.311 40.656C114.175 40.9704 113.977 41.2543 113.729 41.4911C113.481 41.7279 113.188 41.9128 112.868 42.035C112.346 42.2611 111.761 42.2979 111.215 42.1391C110.668 41.9803 110.194 41.6358 109.874 41.165L107.226 44.7917L106.716 43.4221ZM109.895 38.1463L110.594 40.0225C110.653 40.205 110.749 40.3734 110.876 40.5172C111.002 40.661 111.158 40.7772 111.331 40.8584C111.505 40.9397 111.693 40.9844 111.885 40.9897C112.077 40.9949 112.268 40.9607 112.445 40.8891C112.622 40.8229 112.784 40.7217 112.92 40.5915C113.057 40.4613 113.165 40.3049 113.24 40.1315C113.314 39.9582 113.353 39.7715 113.353 39.5829C113.353 39.3942 113.316 39.2074 113.242 39.0338L112.543 37.1506L109.895 38.1463ZM115.956 48.8793L117.085 48.6242L115.981 43.6914L107.39 45.6128L108.494 50.5456L109.623 50.2941L108.788 46.5526L111.631 45.9132L112.379 49.253L113.507 49.0015L112.763 45.6617L115.118 45.1342L115.956 48.8793ZM118 54.5814L117.976 56.0244L110.894 59.0571L117.881 62.3903L117.86 63.6236L109.057 63.4804L109.078 62.261L115.478 62.3623L109.123 59.3925V58.5016L115.572 55.7624L109.168 55.6575L109.189 54.4382L118 54.5814ZM109.33 72.9243C109.944 73.5536 110.73 73.9874 111.589 74.1709C112.166 74.2974 112.761 74.3075 113.341 74.2006C113.922 74.0938 114.475 73.8721 114.968 73.5486C115.461 73.2252 115.885 72.8064 116.214 72.317C116.544 71.8275 116.772 71.2773 116.886 70.6984C117.06 69.837 116.976 68.9432 116.643 68.1296C116.31 67.3161 115.745 66.6191 115.017 66.1264C114.289 65.6337 113.432 65.3674 112.553 65.3609C111.674 65.3544 110.813 65.6082 110.078 66.0901C109.343 66.572 108.767 67.2606 108.422 68.0692C108.078 68.8778 107.98 69.7702 108.142 70.6342C108.303 71.4981 108.717 72.2949 109.33 72.9243ZM109.155 69.1368C109.511 67.3621 111.23 66.2826 113.106 66.6634V66.6599C113.519 66.7434 113.911 66.9074 114.26 67.1426C114.61 67.3777 114.91 67.6794 115.143 68.0304C115.376 68.3814 115.537 68.7748 115.618 69.1883C115.699 69.6017 115.697 70.027 115.614 70.4399C115.531 70.8528 115.366 71.2452 115.131 71.5947C114.896 71.9442 114.595 72.244 114.244 72.4769C113.893 72.7099 113.499 72.8714 113.086 72.9522C112.672 73.0331 112.247 73.0317 111.834 72.9482C109.962 72.5709 108.798 70.9115 109.155 69.1368ZM104.983 79.0345L109.242 78.1821L109.783 76.7847L106.374 75.4606L106.817 74.3217L115.02 77.5113L113.846 80.5367C113.731 80.86 113.553 81.1571 113.322 81.4107C113.091 81.6642 112.811 81.8691 112.5 82.0132C112.188 82.1573 111.851 82.2378 111.509 82.25C111.166 82.2623 110.824 82.2059 110.503 82.0843C109.963 81.9055 109.502 81.5439 109.2 81.0618C108.897 80.5797 108.773 80.0073 108.847 79.4432L104.456 80.3934L104.983 79.0345ZM110.863 77.2039L110.14 79.0694C110.068 79.2434 110.032 79.4298 110.034 79.6179C110.036 79.8059 110.075 79.9917 110.149 80.1644C110.223 80.3371 110.331 80.4933 110.466 80.6239C110.602 80.7544 110.762 80.8567 110.937 80.9247C111.112 80.9927 111.299 81.0251 111.487 81.02C111.675 81.0149 111.86 80.9724 112.032 80.895C112.203 80.8176 112.357 80.7067 112.485 80.5691C112.613 80.4314 112.712 80.2695 112.777 80.093L113.504 78.2205L110.863 77.2039ZM108.288 89.2399L109.298 89.7989L111.747 85.3761L104.061 81.1106L101.615 85.5333L102.629 86.0958L104.484 82.7385L107.037 84.1534L105.381 87.1438L106.395 87.7063L108.051 84.7123L110.147 85.8827L108.288 89.2399ZM90.4747 108.856L89.8145 107.905L92.9586 105.711L91.5612 103.73L88.7664 105.687L88.1062 104.736L90.901 102.78L89.2346 100.387L86.0904 102.581L85.4266 101.63L89.5769 98.741L94.625 105.963L90.4747 108.856ZM83.2781 106.773L79.6343 104.719L78.3557 105.362L83.1174 108.062L82.5304 113.118L83.7951 112.472L84.2423 108.698L87.5506 110.571L88.8397 109.918L84.3855 107.399L85.0178 101.983L83.7602 102.622L83.2781 106.773ZM73.8143 113.405C73.6996 113.07 73.6542 112.716 73.6807 112.363C73.7072 112.01 73.8051 111.667 73.9685 111.353C74.1318 111.039 74.3572 110.762 74.631 110.538C74.9048 110.314 75.2212 110.148 75.561 110.051L77.6117 109.352L76.4763 105.977L77.6327 105.589L80.4275 113.936L77.2204 115.012C76.892 115.14 76.541 115.199 76.1889 115.187C75.8367 115.175 75.4908 115.091 75.1721 114.94C74.8534 114.79 74.5686 114.576 74.3352 114.312C74.1018 114.048 73.9245 113.739 73.8143 113.405ZM74.9601 113.02C75.0212 113.206 75.119 113.377 75.2477 113.523C75.3764 113.67 75.5334 113.789 75.7092 113.873C75.885 113.958 76.076 114.006 76.2709 114.015C76.4657 114.024 76.6603 113.993 76.8431 113.925L78.8938 113.227L77.9611 110.431L75.9104 111.13C75.7211 111.188 75.5455 111.283 75.3941 111.411C75.2428 111.538 75.119 111.695 75.0301 111.872C74.9412 112.048 74.8892 112.241 74.8772 112.439C74.8652 112.636 74.8934 112.834 74.9601 113.02ZM69.849 109.107L71.2673 116.621L72.4656 116.394L70.8342 107.744L65.3843 108.771L65.5974 109.91L69.849 109.107ZM56.5458 113.639C56.528 112.762 56.7693 111.9 57.2394 111.16C57.7096 110.421 58.3877 109.836 59.1887 109.48C59.9898 109.125 60.878 109.013 61.7421 109.16C62.6062 109.307 63.4077 109.706 64.0459 110.307C64.6842 110.907 65.1309 111.683 65.33 112.537C65.5291 113.39 65.4717 114.284 65.1651 115.105C64.8585 115.926 64.3162 116.638 63.6063 117.152C62.8964 117.667 62.0505 117.96 61.1747 117.995C60.5827 118.021 59.9914 117.928 59.4359 117.722C58.8803 117.516 58.3717 117.2 57.9402 116.794C57.5087 116.388 57.1629 115.9 56.9234 115.358C56.6839 114.816 56.5555 114.231 56.5458 113.639ZM64.2001 113.359C64.1302 111.452 62.6839 110.03 60.8708 110.096C59.0577 110.162 57.7267 111.682 57.7895 113.59C57.7863 114.023 57.8709 114.453 58.0382 114.853C58.2055 115.253 58.452 115.614 58.763 115.917C59.0739 116.219 59.4428 116.455 59.8474 116.61C60.252 116.766 60.6839 116.838 61.1171 116.822C61.5503 116.806 61.9758 116.703 62.368 116.518C62.7602 116.333 63.1109 116.071 63.399 115.747C63.6871 115.423 63.9066 115.044 64.0443 114.633C64.1819 114.222 64.2349 113.788 64.2001 113.356V113.359ZM52.1231 112.311L50.2855 108.377L48.8392 108.192L50.8025 112.234C50.2361 112.295 49.7087 112.552 49.3114 112.96C48.914 113.368 48.6716 113.902 48.6261 114.47C48.5843 114.811 48.611 115.156 48.7045 115.486C48.798 115.817 48.9564 116.125 49.1705 116.393C49.3846 116.661 49.65 116.884 49.9512 117.048C50.2525 117.212 50.5835 117.315 50.9248 117.349L54.1388 117.775L55.2952 109.041L54.0864 108.88L53.6078 112.51L52.1231 112.311ZM51.4733 113.394L53.4541 113.656L53.0943 116.455L51.0995 116.189C50.9039 116.18 50.7124 116.13 50.5371 116.042C50.3618 115.955 50.2066 115.832 50.0812 115.682C49.9559 115.531 49.8631 115.356 49.8088 115.168C49.7546 114.98 49.74 114.782 49.7659 114.588C49.7919 114.394 49.8579 114.208 49.9597 114.04C50.0615 113.873 50.1969 113.729 50.3574 113.616C50.5179 113.504 50.7 113.426 50.892 113.388C51.0841 113.35 51.282 113.352 51.4733 113.394ZM40.825 115.099L41.1289 113.981L44.8285 114.994L45.4643 112.667L42.1665 111.762L42.4739 110.648L45.7717 111.553L46.5403 108.737L42.8442 107.724L43.1481 106.609L48.039 107.944L45.7124 116.434L40.825 115.099ZM33.9778 112.406L35.2564 113.104L39.3997 105.32L38.3237 104.747L35.3088 110.393L35.8189 103.405L35.0293 102.986L29.4852 107.28L32.5001 101.634L31.4241 101.061L27.2808 108.824L28.3673 109.404L34.5158 104.719L33.9778 112.406ZM20.8596 98.2272C21.4247 97.5539 22.1766 97.0629 23.0204 96.8163C23.8642 96.5698 24.7621 96.5786 25.6009 96.8417C26.4397 97.1048 27.1818 97.6104 27.7335 98.2948C28.2853 98.9791 28.6221 99.8115 28.7014 100.687C28.7806 101.563 28.5989 102.442 28.179 103.214C27.7591 103.987 27.12 104.617 26.3421 105.027C25.5642 105.436 24.6825 105.606 23.8082 105.515C22.9338 105.424 22.106 105.076 21.4291 104.516C20.9744 104.143 20.5985 103.684 20.3232 103.164C20.048 102.645 19.8789 102.076 19.8259 101.491C19.7729 100.905 19.837 100.315 20.0145 99.755C20.192 99.1947 20.4793 98.6753 20.8596 98.2272ZM26.7671 103.101C27.9829 101.626 27.8431 99.6072 26.4457 98.4508C25.0483 97.2945 23.0361 97.5425 21.8203 99.0202C21.5414 99.3436 21.3299 99.7195 21.1983 100.126C21.0666 100.532 21.0174 100.961 21.0535 101.386C21.0897 101.812 21.2105 102.226 21.4088 102.604C21.6071 102.982 21.8789 103.317 22.2084 103.589C22.5378 103.86 22.9182 104.064 23.3273 104.186C23.7363 104.309 24.1657 104.349 24.5904 104.303C25.015 104.258 25.4263 104.128 25.8001 103.922C26.1739 103.715 26.5027 103.436 26.7671 103.101ZM18.4247 94.2794L19.6684 90.1181L18.7147 89.0245L17.4955 93.35C17.0321 93.0197 16.4681 92.8613 15.9006 92.9021C15.3331 92.9429 14.7976 93.1804 14.3862 93.5736C14.1289 93.8003 13.9193 94.0761 13.7697 94.3848C13.6201 94.6935 13.5335 95.0289 13.515 95.3714C13.4965 95.7139 13.5464 96.0566 13.6618 96.3797C13.7772 96.7027 13.9558 96.9995 14.1871 97.2527L16.3042 99.6984L22.9698 93.9475L22.1733 93.0216L19.4029 95.4149L18.4247 94.2794ZM17.2195 94.6567L18.526 96.1696L16.3915 98.0283L15.078 96.505C14.9506 96.3652 14.8525 96.2014 14.7895 96.0231C14.7265 95.8449 14.6998 95.6558 14.7111 95.467C14.7224 95.2783 14.7714 95.0938 14.8552 94.9243C14.939 94.7548 15.056 94.6038 15.1991 94.4803C15.3422 94.3568 15.5086 94.2631 15.6885 94.205C15.8685 94.1469 16.0582 94.1255 16.2465 94.1419C16.4349 94.1583 16.618 94.2124 16.7851 94.3008C16.9522 94.3892 17.0999 94.5102 17.2195 94.6567ZM8.13647 88.8706L9.10768 88.2382L11.2038 91.4561L13.2265 90.1354L11.361 87.2704L12.3287 86.638L14.1977 89.5029L16.6432 87.9097L14.5471 84.6953L15.5182 84.0665L18.2781 88.3011L10.8998 93.1087L8.13647 88.8706ZM1.30317 63.1656L0.153809 63.3019L0.758188 68.329L9.49194 67.281L8.89804 62.2608L7.74869 62.3971L8.19934 66.205L5.30324 66.5544L4.90148 63.1587L3.75212 63.2949L4.15387 66.6906L1.75384 66.9735L1.30317 63.1656ZM8.91193 55.6959L5.38348 57.9457L8.82459 60.3247L8.80013 61.7221L4.31447 58.62L0 61.3938L0.0279433 59.9475L3.23498 57.9073L0.0908238 55.7343L0.118778 54.3124L4.31098 57.2086L8.93289 54.2775L8.91193 55.6959ZM4.94291 46.8336C4.64391 46.6468 4.31011 46.5227 3.96172 46.4689C3.61544 46.409 3.26061 46.4201 2.91873 46.5014C2.57685 46.5827 2.25505 46.7326 1.97283 46.942C1.6906 47.1513 1.45383 47.4159 1.27687 47.7195C1.0999 48.0231 0.986429 48.3594 0.943326 48.7082L0.391357 52.048L9.07969 53.4838L9.27883 52.2821L5.76436 51.6987L6.11371 49.5641C6.18457 49.2188 6.18454 48.8627 6.11361 48.5174C6.04268 48.1721 5.90234 47.8447 5.7011 47.5553C5.49986 47.2658 5.24191 47.0203 4.94291 46.8336ZM3.18704 47.6776C3.37692 47.6329 3.57386 47.6269 3.76608 47.6602C3.95917 47.6908 4.14413 47.76 4.30999 47.8635C4.47585 47.967 4.61924 48.1028 4.73164 48.2628C4.84405 48.4228 4.92319 48.6037 4.96436 48.7948C5.00553 48.986 5.0079 49.1834 4.97133 49.3755L4.62198 51.51L1.73286 51.0314L2.08221 48.8969C2.10804 48.7035 2.17261 48.5174 2.27207 48.3496C2.37153 48.1818 2.50383 48.0358 2.66105 47.9203C2.81826 47.8048 2.99717 47.7223 3.18704 47.6776ZM2.30913 42.7054L9.61056 44.9762L10.8962 40.8434L12.0001 41.1928L10.3547 46.4889L1.9458 43.8792L2.30913 42.7054ZM13.7225 32.8779C13.2857 32.1151 12.633 31.4986 11.8465 31.106C11.3203 30.8396 10.7463 30.681 10.1581 30.6394C9.56983 30.5979 8.97922 30.6742 8.42086 30.8639C7.86249 31.0536 7.34761 31.3528 6.90644 31.7441C6.46526 32.1355 6.10665 32.6109 5.85165 33.1427C5.46711 33.9331 5.32506 34.8196 5.44336 35.6907C5.56167 36.5617 5.93505 37.3782 6.51649 38.0375C7.09793 38.6967 7.86143 39.1692 8.71084 39.3954C9.56026 39.6216 10.4576 39.5914 11.2899 39.3087C12.1222 39.0259 12.8522 38.5032 13.3881 37.8063C13.9239 37.1095 14.2415 36.2697 14.301 35.3927C14.3606 34.5157 14.1592 33.6407 13.7225 32.8779ZM12.9435 36.5872C12.1504 38.2117 10.215 38.8231 8.49623 37.9846L8.5067 37.9916C8.10165 37.8249 7.735 37.5771 7.42931 37.2633C7.12362 36.9496 6.88537 36.5766 6.7292 36.1674C6.57304 35.7582 6.50227 35.3213 6.52124 34.8837C6.54022 34.4461 6.64854 34.017 6.83955 33.6228C7.03055 33.2286 7.3002 32.8777 7.6319 32.5916C7.96359 32.3055 8.3503 32.0903 8.76827 31.9593C9.18623 31.8283 9.6266 31.7841 10.0623 31.8296C10.4979 31.8751 10.9196 32.0093 11.3015 32.2239C13.0238 33.0588 13.7365 34.9628 12.9435 36.5872ZM19.4519 28.0519L15.1129 27.8214L14.2396 29.0371L17.2125 31.1716L16.5138 32.1603L9.35913 27.0283L11.2526 24.3907C11.4446 24.1066 11.6913 23.8635 11.9783 23.6758C12.2653 23.4881 12.5868 23.3594 12.924 23.2972C13.2613 23.2351 13.6076 23.2408 13.9426 23.314C14.2776 23.3872 14.5947 23.5264 14.8754 23.7235C15.3547 24.0312 15.7116 24.4966 15.8845 25.0393C16.0573 25.5821 16.0353 26.1682 15.8221 26.6964L20.3113 26.8676L19.4519 28.0519ZM13.2998 28.3593L14.4666 26.7349C14.585 26.5841 14.6711 26.4106 14.7195 26.2252C14.768 26.0397 14.7778 25.8463 14.7483 25.6569C14.7188 25.4675 14.6507 25.2862 14.5481 25.1243C14.4456 24.9624 14.3108 24.8233 14.1522 24.7156C13.999 24.6056 13.8251 24.5278 13.641 24.4868C13.4569 24.4459 13.2664 24.4426 13.081 24.4772C12.8956 24.5118 12.7191 24.5835 12.5622 24.6882C12.4053 24.7928 12.2711 24.9281 12.1679 25.0859L10.9941 26.7209L13.2998 28.3593ZM18.8056 17.3472L17.9637 16.5541L14.4841 20.2297L20.8842 26.2741L24.3568 22.5985L23.5148 21.8054L20.8807 24.6005L18.7602 22.595L21.1078 20.1074L20.2694 19.3143L17.9182 21.8019L16.1715 20.1423L18.8056 17.3472ZM22.3374 12.5702L23.5357 11.7596L30.0755 15.8334L28.8143 8.20281L29.8344 7.50403L34.7568 14.8028L33.7437 15.5015L30.1663 10.1943L31.3681 17.1052L30.6275 17.6049L24.6885 13.8874L28.2659 19.1946L27.2562 19.8759L22.3374 12.5702Z" fill="white" />
				</svg>
			</div>
		</div>
	<?php } ?>
	<div id="qodef-page-wrapper" class="<?php echo esc_attr(obsius_get_page_wrapper_classes()); ?>">
		<?php
		// Hook to include page header template
		do_action('obsius_action_page_header_template');
		?>
		<div id="qodef-page-outer">
			<?php
			// Include title template
			get_template_part('title');

			// Hook to include additional content before page inner content
			do_action('obsius_action_before_page_inner');
			?>
			<div id="qodef-page-inner" class="<?php echo esc_attr(obsius_get_page_inner_classes()); ?>">