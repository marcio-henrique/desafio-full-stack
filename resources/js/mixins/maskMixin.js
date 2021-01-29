import {VMoney} from 'v-money'
export default {
    data() {
        return {
            phoneNumberMask: '(##) #####-####',
            cpfMask: '###.###.###-##',
            cnpjMask: '##.###.###/####-##',

            money: {
                decimal: ',',
                thousands: '.',
                prefix: 'R$ ',
                precision: 2,
                masked: false /* doesn't work with directive */
            }
        }
    },
    methods: {
        getOfficialDocumentMask(officialDocument) {
            if (officialDocument === 'CPF') {
                return this.cpfMask;
            } else if (officialDocument === 'CNPJ') {
                return this.cnpjMask;
            }
        },
    },
    directives: {money: VMoney}
}
