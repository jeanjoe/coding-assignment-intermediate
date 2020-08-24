import axios from 'axios';

const actions = {
    getTransactions({ commit }, extra) {
        axios.get('/api/v1/transactions', { params: extra})
        .then(res => {
            commit('FETCH_TRANSACTIONS', res.data.transactions)
        }).catch(err => console.log(`Error `, err))
    }
};

export default actions;
