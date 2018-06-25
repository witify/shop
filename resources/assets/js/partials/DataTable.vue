<template>
    <div class="data-table box is-paddingless">
        <div class="data-table__controls">
            <div class="control">
                <form @submit.prevent="onSearch()">
                    <b-field>
                        <b-input @input="onDebounceSearch()" v-model="search" placeholder="Search..." type="search" icon="magnify"></b-input>
                        <p class="control">
                            <button class="button is-primary">Search</button>
                        </p>
                    </b-field>
                </form>
            </div>
        </div>
        <b-table
            v-if="data != null"
            :data="data.data"
            :bordered="false"
            :striped="true"
            :narrowed="false"
            :hoverable="true"
            :focusable="false"
            :mobile-cards="true"
            :loading="loading"

            paginated
            backend-pagination
            :current-page="data.current_page"
            :total="data.total"
            :per-page="data.per_page"
            @page-change="onPageChange"

            backend-sorting
            :default-sort="[sortField, sortOrder]"
            @sort="onSort"

            @click="onClick"
            >

            <template slot-scope="props">
                <slot :row="props.row" :index="props.index"></slot>
                
                <b-table-column label="" :width="85">

                    <a v-if="editButton" :href="url + '/' + props.row.id + '/edit'">
                        <div class="icon has-text-grey">
                            <i class="mdi mdi-settings mdi-18px"></i>
                        </div>
                    </a>

                    <v-delete-button v-if="deleteButton" :url="url + '/' + props.row.id" @success="loadData()"></v-delete-button>

                </b-table-column>

            </template>

            <template slot="empty">
                <section class="section">
                    <div class="content has-text-grey has-text-centered">
                        <p>
                            <b-icon
                                icon="emoticon-sad"
                                size="is-large">
                            </b-icon>
                        </p>
                        <p>Nothing here.</p>
                    </div>
                </section>
            </template>
        </b-table>
    </div>
</template>

<script>
export default {
    props: {
        url: {
            required: true,
            type: String
        },
        editButton: {
            default: true,
            type: Boolean
        },
        deleteButton: {
            default: true,
            type: Boolean
        }
    },
    data() {
        return {
            data: null,
            page: 1,
            sortField: null,
            sortOrder: null,
            search: null,
            loading: true
        }
    },
    created() {
        this.loadData()
    },
    methods: {
        loadData() {
            this.loading = true
            let url = this.url + '?page=' + this.page
            if (this.sortField) {
                url = url + '&sort_field=' + this.sortField
            }
            if (this.sortOrder) {
                url = url + '&sort_order=' + this.sortOrder
            }
            if (this.search) {
                url = url + '&search=' + this.search
            }
            axios.get(url).then(response => {
                this.data = response.data
                this.loading = false
            })
            .catch(error => {
                this.loading = false
            })
        },
        onPageChange(page) {
            this.page = page
            this.loadData()
        },
        onSort(field, order) {
            this.sortField = field
            this.sortOrder = order
            this.loadData()
        },
        onSearch() {
            this.loadData()
        },
        onDebounceSearch: debounce(function() {
            this.loadData()
        }, 250),
        onClick(payload) {
            this.$emit('click', payload);
        }
    }
}
</script>
