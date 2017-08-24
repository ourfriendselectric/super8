<template>
    <div>
        <form id="search">
            Search <input name="query" v-model="searchQuery">
        </form>
        <table>
            <thead>
                <tr>
                    <th 
                        v-for="key in gridColumns"
                        @click="sortBy(key)"
                        :class="{ active: sortKey == key }"
                    >
                        {{ key | capitalize }}
                        <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="entry in filteredData">
                    <td v-for="key in gridColumns">
                        <a v-if="key === 'song' && entry[key] !== ''" :href="entry[key]" download>
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                        </a>
                        <a v-if="key === 'video' && entry[key] !== ''" :href="entry[key]" download>
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                        </a>
                        <span v-if="key !== 'song' && key !== 'video'">{{ entry[key] }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            registrations: Array,
            columns: Array,
        },

        data: function () {
            return {
                sortKey: '',
                sortOrders: [
                    'name',
                    'email',
                    'phone',
                    'artist',
                    'location',
                    'code',
                    'paid',
                    'song',
                    'video'
                ],
                searchQuery: '',
                gridColumns: [
                    'name',
                    'email',
                    'phone',
                    'artist',
                    'location',
                    'code',
                    'paid',
                    'song',
                    'video'
                ],
                gridData: this.registrations
            }
        },

        computed: {
            filteredData: function () {
                var sortKey = this.sortKey
                var filterKey = this.searchQuery && this.searchQuery.toLowerCase()
                var order = this.sortOrders[sortKey] || 1
                var data = this.gridData
                if (filterKey) {
                    data = data.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                        })
                    })
                }
                if (sortKey) {
                    data = data.slice().sort(function (a, b) {
                        a = a[sortKey]
                        b = b[sortKey]
                        return (a === b ? 0 : a > b ? 1 : -1) * order
                    })
                }
                return data
            }
        },

        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            }
        },

        methods: {
            sortBy: function (key) {
                this.sortKey = key
                this.sortOrders[key] = this.sortOrders[key] * -1
            },
            test: function(path) {
                return "<span></span>";
            }
        }
    }
</script>
