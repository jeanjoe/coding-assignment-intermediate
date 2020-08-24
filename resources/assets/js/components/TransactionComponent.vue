<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            Transactions [{{ transactions.total }}]
          </div>
          <br />
          <div class="panel-body--">
            <table class="table table-striped">
              <thead class="font-uppercase text-small">
                <tr>
                  <th scope="col">TRN ID</th>
                  <th scope="col">Individual</th>
                  <th scope="col">Sacco</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Type</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="transaction in transactions.data"
                  v-bind:key="transaction.id"
                >
                  <td>{{ transaction.id }}</td>
                  <td>{{ transaction.individual.fullName }}</td>
                  <td>{{ transaction.sacco.name }}</td>
                  <td>{{ transaction.amount }}</td>
                  <td>{{ transaction.type }}</td>
                  <td>
                    <button
                      class="btn btn-danger btn-sm"
                      @click="deletePost(transaction.id)"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="panel-footer">
            <nav aria-label="...">
              <ul class="pager">
                <li class="previous">
                  <a
                    href="javascript:"
                    role="button"
                    @click="previousPage()"
                    v-if="transactions.current_page > 1"
                    ><span aria-hidden="true">&larr;</span> Previous</a
                  >
                </li>
                <li class="next">
                  <a
                    href="javascript:"
                    role="button"
                    @click="nextPage()"
                    v-if="transactions.current_page <= transactions.total"
                    >Next <span aria-hidden="true">&rarr;</span></a
                  >
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "Transactions",
  mounted() {
    this.$store.dispatch("getTransactions", { perPage: this.perPage });
  },
  data() {
    return {
      perPage: 50,
    };
  },
  computed: {
    ...mapGetters(["transactions"]),
  },
  methods: {
    nextPage() {
      const setPage = {
        page: this.transactions.current_page + 1,
        perPage: this.perPage,
      };
      this.$store.dispatch("getTransactions", setPage);
    },
    previousPage() {
      const setPage = {
        page: this.transactions.current_page - 1,
        perPage: this.perPage,
      };
      this.$store.dispatch("getTransactions", setPage);
    },
  },
};
</script>
