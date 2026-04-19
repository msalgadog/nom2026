$.formUtils.addValidator({
    name: 'nss',
    validatorFunction: function(value, $el, config, language, $form) {
        function nssValido(value) {
            const re = /^(\d{2})(\d{2})(\d{2})\d{5}$/,
                validado = value.match(re);
            if (!validado) return false;
            const subDeleg = parseInt(validado[1], 10),
                anno = new Date().getFullYear() % 100;
            var annoAlta = parseInt(validado[2], 10),
                annoNac = parseInt(validado[3], 10);
            if (subDeleg != 97) {
                if (annoAlta <= anno) annoAlta += 100;
                if (annoNac <= anno) annoNac += 100;
                if (annoNac > annoAlta) return false;
            }
            return luhn(value);
        }

        function luhn(value) {
            var suma = 0,
                par = false,
                digito;
            for (var i = value.length - 1; i >= 0; i--) {
                var digito = parseInt(value.charAt(i), 10);
                if (par)
                    if ((digito *= 2) > 9) digito -= 9;
                par = !par;
                suma += digito;
            }
            return (suma % 10) == 0;
        }
        if (nssValido(value)) {
            valido = true;
        } else {
            valido = false;
        }
        return valido;
    },
    errorMessage: 'El número de seguridad social ingresado no es válido',
    errorMessageKey: 'badEvenNumber'
});