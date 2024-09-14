<script setup>
    import HelloWorld from './components/HelloWorld.vue'
    import TheWelcome from './components/TheWelcome.vue'
</script>


<template>

    <div id="app">
        <div class="grid grid-cols-5 gap-3 mx-auto mt-5 p-6 bg-white shadow-md rounded-lg">
            <!-- Select 1 -->
            <div class="">
                <label for="option1" class="block text-sm font-medium text-gray-700 mb-1">Product Type</label>
                <select id="option1" v-model="form.product_type" @change="changeProductType"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option v-for="(option, index) in product_type" :key="index" :value="option.name">
                        {{ option . name }} <span>({{ option . qty }})</span>
                    </option>
                </select>
            </div>

            <!-- Select 2 -->
            <div class="">
                <label for="option2" class="block text-sm font-medium text-gray-700 mb-1">Grade</label>
                <select id="option2" v-model="form.grade" @change="changeGrade"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option v-for="(option, index) in grade" :key="index" :value="option.name">
                        {{ option . name }} <span>({{ option . qty }})</span>
                    </option>
                </select>
            </div>

            <!-- Select 3 -->
            <div class="">
                <label for="option3" class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                <select id="option3" v-model="form.size" @change="changeSize"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option v-for="(option, index) in size" :key="index" :value="option.name">
                        {{ option . name }} <span>({{ option . qty }})</span>
                    </option>
                </select>
            </div>

            <!-- Select 4 -->
            <div class="">
                <label for="option4" class="block text-sm font-medium text-gray-700 mb-1">Connection</label>
                <select id="option4" v-model="form.connection" @change="changeConnection"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option v-for="(option, index) in connection" :key="index" :value="option.name">
                        {{ option . name }} <span>({{ option . qty }})</span>
                    </option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="">
                <button
                    class="w-1/2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="cari">
                    Cari
                </button>
            </div>
        </div>

        <div class="mt-5">
            <table class="mx-2">
                <tr class="bg-gray-200">
                    <td class="border border-black">id</td>
                    <td class="border border-black">code</td>
                    <td class="border border-black">item_id</td>
                    <td class="border border-black">qty</td>
                    <td class="border border-black">qty_unit</td>
                    <td class="border border-black">country_name</td>
                    <td class="border border-black">item_code</td>
                    <td class="border border-black">item_desc</td>
                    <td class="border border-black">product_type</td>
                    <td class="border border-black">grade</td>
                    <td class="border border-black">connection</td>
                    <td class="border border-black">size</td>
                </tr>
                <tr v-for="(item, index) in items" :key="index" :value="item">
                    <td class="border border-black">{{ item . id }}</td>
                    <td class="border border-black">{{ item . code }}</td>
                    <td class="border border-black">{{ item . item_id }}</td>
                    <td class="border border-black">{{ item . qty }}</td>
                    <td class="border border-black">{{ item . qty_unit }}</td>
                    <td class="border border-black">{{ item . country_name }}</td>
                    <td class="border border-black">{{ item . item_code }}</td>
                    <td class="border border-black">{{ item . item_desc }}</td>
                    <td class="border border-black">{{ item . product_type }}</td>
                    <td class="border border-black">{{ item . grade }}</td>
                    <td class="border border-black">{{ item . connection }}</td>
                    <td class="border border-black">{{ item . size }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<style scoped>
</style>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                all_items: [],
                items: [],
                all_product_type: [],
                all_grade: [],
                all_size: [],
                all_connection: [],
                product_type: [],
                grade: [],
                size: [],
                connection: [],
                form: {
                    product_type: '',
                    grade: '',
                    size: '',
                    connection: '',
                },
            };
        },
        mounted() {
            axios.get('http://127.0.0.1:8000/api/data')
                .then(response => {
                    this.all_items = response.data.data;
                    this.items = response.data.data;
                    this.all_product_type = response.data.product_type;
                    this.all_grade = response.data.grade;
                    this.all_size = response.data.size;
                    this.all_connection = response.data.connection;
                    this.product_type = response.data.product_type;
                    this.grade = response.data.grade;
                    this.size = response.data.size;
                    this.connection = response.data.connection;
                    // console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });

            
        },

        methods:{
          changeProductType() {
            this.grade = this.all_grade.filter(data => data.product_type.includes(this.form.product_type));
            this.size = this.all_size.filter(data => data.product_type.includes(this.form.product_type));
            this.connection = this.all_connection.filter(data => data.product_type.includes(this.form.product_type));
          },

          changeGrade() {
            this.product_type = this.all_product_type.filter(data => data.grade.includes(this.form.grade));
            this.size = this.all_size.filter(data => data.grade.includes(this.form.grade));
            this.connection = this.all_connection.filter(data => data.grade.includes(this.form.grade));
          },

          changeSize() {
            this.grade = this.all_grade.filter(data => data.size.includes(this.form.size));
            this.product_type = this.all_product_type.filter(data => data.size.includes(this.form.size));
            this.connection = this.all_connection.filter(data => data.size.includes(this.form.size));
          },

          changeConnection() {
            this.grade = this.all_grade.filter(data => data.connection.includes(this.form.connection));
            this.size = this.all_size.filter(data => data.connection.includes(this.form.connection));
            this.product_type = this.all_product_type.filter(data => data.connection.includes(this.form.connection));
          },

          cari(){
            this.items = this.all_items;
            if(this.form.product_type){
              this.items = this.items.filter(data => data.product_type == this.form.product_type);
            }

            if(this.form.grade){
              this.items = this.items.filter(data => data.grade == this.form.grade);
            }

            if(this.form.size){
              this.items = this.items.filter(data => data.size == this.form.size);
            }

            if(this.form.connection){
              this.items = this.items.filter(data => data.connection == this.form.connection);
            }
          }

        }
    }
</script>
