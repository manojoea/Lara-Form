<template>
    <v-container>
            <v-form ref="form" @submit.prevent="signup">

                <v-text-field
                        v-model="form.name"
                        label="Full Name"
                        type="text"
                        required
                ></v-text-field>
                <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>

                <v-text-field
                        v-model="form.email"
                        label="E-mail"
                        type="email"
                        required
                ></v-text-field>
                <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>

                <v-text-field
                        v-model="form.password"
                        label="Password"
                        type="password"
                        required
                ></v-text-field>
                <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>

                <v-text-field
                        v-model="form.password_confirmation"
                        label="Confirm Password"
                        type="password"
                        required
                ></v-text-field>
                <span class="red--text" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</span>

                <v-btn
                        color="green"
                        type="submit"
                >
                  Sign Up
                </v-btn>

                <router-link to="/login">
                    <v-btn
                    color="blue"
                    >Login</v-btn>
                </router-link>
            </v-form>

    </v-container>
</template>

<script>
    export default {

        data(){
            return{
                form:{
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                },
                errors:{}
            }
        },
        methods: {
            signup(){
                User.signup(this.form)
                this.$router.push({
                    name: 'forum',
                })
            }
        },
        created(){
            if (User.loggedIn()) {
                this.$router.push({
                    name: 'forum',
                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
