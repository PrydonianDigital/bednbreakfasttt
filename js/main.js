Gumby.init();

var $j = jQuery.noConflict();

$j(function() {

	$j('.product-addon-sausage-type .addon-select').prop('disabled', true);
	$j('.product-addon-beans-type .addon-select').prop('disabled', true);

	$j('.addon-checkbox').change(function () {
		var maxAllowed = 6;
		if ($j('.addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
	});
	$j('.addon-checkbox[value="sausage-select-options-below"]').change(function () {
		if($j('.addon-checkbox[value="sausage-select-options-below"]').prop('checked')) {
			$j('.product-addon-sausage-type .addon-select').prop('disabled', false);
		} else {
			$j('.product-addon-sausage-type .addon-select').prop('disabled', true);
		}
	});
	$j('.addon-checkbox[value="beans-select-options-below"]').change(function () {
		if($j('.addon-checkbox[value="beans-select-options-below"]').prop('checked')) {
			$j('.product-addon-beans-type .addon-select').prop('disabled', false);
		} else {
			$j('.product-addon-beans-type .addon-select').prop('disabled', true);
		}
	});
	$j('.addon-checkbox[value="egg-select-options-below"]').change(function () {
		if($j('.addon-checkbox[value="egg-select-options-below"]').prop('checked')) {
			$j('.product-addon-egg-type .addon-select').prop('disabled', false);
		} else {
			$j('.product-addon-egg-type .addon-select').prop('disabled', true);
		}
	});

});