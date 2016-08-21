jQuery(document).ready(function () {
    jQuery('#form-filter').submit(function () {
        try {
            var sort = jQuery('#filter-sort').val();
            var eptype = jQuery('#filter-eptype').val();

            var category = jQuery('#filter-category').val();
            var country = jQuery('#filter-country').val();
            var year = jQuery('#filter-year').val();
            var submitPath = '';

            if (eptype != ''){
                switch (eptype){
                    case 'theater':
                        submitPath += 'phim-chieu-rap/';
                        break;
                    case 'single':
                        submitPath += 'phim-le/';
                        break;
                    case 'serial':
                        submitPath += 'phim-bo/';
                        break;
                }
            }
            if (category != ''){
                if (submitPath == '') submitPath = 'the-loai/';
                submitPath += jQuery('#filter-category option:selected').attr('data-slug') + '/';
            }

            if (country != ''){
                if (submitPath == '')submitPath = 'quoc-gia/' + country + '/';
                else submitPath += country + '/';
                
            }

            if (year != '' && year.length == 4){
                if (submitPath == '')submitPath += 'phim-' + year + '/';
                else submitPath += year + '/';
            }

            if (sort != '' && sort != 'updatetime'){
                submitPath += (submitPath.indexOf('?') == -1) ? '?' : '&';
                submitPath += 'sort=' + sort;
            }

            var directURL = MAIN_URL + '/' + submitPath;
            window.location.replace(directURL);
            return false;
        }
        catch (err){
            alert(err.description);
            return true;
        }
    });
});