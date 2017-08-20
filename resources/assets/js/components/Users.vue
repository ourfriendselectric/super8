<template>
    <div>
        <input v-model="search" class="form-control" placeholder="Filter users by name or age">
        <table>
            <thead>
                <th v-for="column in columns">
                    <a href="#" v-on:click="sortBy(column)" v-bind:class="{ active: sortKey == column }">
                        {{ column }}
                    </a>
                </th>
            </thead>
            <tbody>
                <tr v-for="user in orderedUsers">
                <!-- <tr v-for="user in users | filterBy search | orderBy sortKey reverse"> -->
                <!-- <tr v-for="user in users"> -->
                    <td>{{ user.name }}</td>
                    <td>{{ user.artist }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data: function() {
            return {
                sortKey: 'name',
                reverse: false,
                search: '',
                columns: ['name', 'artist'],
                newUser: {},
                users: [
                    { name: 'John', artist: 50 },
                    { name: 'Jane', artist: 22 },
                    { name: 'Paul', artist: 34 },
                    { name: 'Kate', artist: 15 },
                    { name: 'Amanda', artist: 65 },
                    { name: 'Steve', artist: 38 },
                    { name: 'Keith', artist: 21 },
                    { name: 'Don', artist: 50 },
                    { name: 'Susan', artist: 21 }
                ]
            };
        },

        computed: {
          orderedUsers: function () {
            return _.orderBy(this.users, 'name')
          }
        },

        methods: {
            sortBy: function(sortKey) {
                return this.users.orderBy(this.users, sortKey)
            },
        }
    }
</script>
