const { default: state } = require("./state");

const getters = {
    transactions: state => {
        return state.transactions
    }
};

export default getters;
