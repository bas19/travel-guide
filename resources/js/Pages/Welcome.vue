<script setup>
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';
import { Head } from '@inertiajs/vue3';
import {ref} from 'vue';
import axios from 'axios';

const infoModal = ref(false);

let cities = ref([
    {
        'name': 'Tokyo',
        'image_link': '/assets/images/tokyo.jpg',
        'description': "Tokyo, Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods. The Imperial Palace sits amid large public gardens. The city's many museums offer exhibits ranging from classical art (in the Tokyo National Museum) to a reconstructed kabuki theater (in the Edo-Tokyo Museum).",
    },
    {
        'name': 'Yokohama',
        'image_link': '/assets/images/yokohama.jpg',
        'description': "Yokohama, a Japanese city south of Tokyo, was one of the first Japanese ports opened to foreign trade, in 1859. It contains a large Chinatown with hundreds of Chinese restaurants and shops. It’s also known for Sankei-en Garden, a botanical park containing preserved Japanese residences from different eras, and the seaside Minato Mirai district, site of the 296m Landmark Tower. ",
    },
    {
        'name': 'Kyoto',
        'image_link': '/assets/images/kyoto.jpg',
        'description': "Kyoto, once the capital of Japan, is a city on the island of Honshu. It's famous for its numerous classical Buddhist temples, as well as gardens, imperial palaces, Shinto shrines and traditional wooden houses. It’s also known for formal traditions such as kaiseki dining, consisting of multiple courses of precise dishes, and geisha, female entertainers often found in the Gion district."
   
    },
    {
        'name': 'Osaka',
        'image_link': '/assets/images/osaka.jpg',
        'description': "Osaka is a large port city and commercial center on the Japanese island of Honshu. It's known for its modern architecture, nightlife and hearty street food. The 16th-century shogunate Osaka Castle, which has undergone several restorations, is its main historical landmark. It's surrounded by a moat and park with plum, peach and cherry-blossom trees. Sumiyoshi-taisha is among Japan’s oldest Shinto shrines.",
    },
    {
        'name': 'Sapporo',
        'image_link': '/assets/images/sapporo.jpg',
        'description': "Sapporo, capital of the mountainous northern Japanese island of Hokkaido, is famous for its beer, skiing and annual Sapporo Snow Festival featuring enormous ice sculptures. The Sapporo Beer Museum traces the city’s brewing history and has tastings and a beer garden. Ski hills and jumps from the 1972 Winter Olympics are scattered within the city limits, and Niseko, a renowned ski resort, is nearby.",
    },
    {
        'name': 'Nagoya',
        'image_link': '/assets/images/nagoya.jpg',
        'description': "Nagoya, capital of Japan’s Aichi Prefecture, is a manufacturing and shipping hub in central Honshu. The city’s Naka ward is home to museums and pachinko (gambling machine) parlors. Naka also includes the Sakae entertainment district, with attractions like the Sky-Boat Ferris wheel, which is attached to a mall. In northern Naka is Nagoya Castle, a partly reconstructed 1612 royal home displaying Edo-era artifacts.",
    }
]);
let cityForecastData = ref(null);
let cityNearbyPlaces = ref([]);

async function getForecastData(city) {
    let result = await axios.get('/api/forecast/' + city).catch((error) => console.log(error));
    return result;
}

async function getNearbyPlaces(city) {
    let result = axios.get('/api/venue/search?limit=5&near=' + city).catch((error) => console.log(error));
    return result;
}

const showInfoModal = async (city) => {
    const forecastResult = await getForecastData(city);
    const placesResult = await getNearbyPlaces(city);
    cityForecastData = forecastResult.data;
    cityNearbyPlaces = placesResult.data.results;
    infoModal.value = true;
};
const closeModal = () => {
    infoModal.value = false;
};
</script>

<template>
    <Modal :show="infoModal" @close="closeModal">
        <div class="p-6">
            <div class="flex justify-end">
                <SecondaryButton @click="closeModal"> X </SecondaryButton>
            </div>
            
            <h2 class="text-lg font-medium text-gray-900">
                {{ cityForecastData.name }}
            </h2>

            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" xml:space="preserve"><path fill="#282D33" d="m89.738 17.398 3.898.84-2.67 12.39-3.897-.84zM69.905 18.72l3.86 12.066L69.968 32l-3.86-12.066zM49.597 31.053l9.345 8.512-2.685 2.948L46.912 34zM109.043 83.388l9.344 8.516-2.686 2.948-9.344-8.516zM115.669 67.396l12.33 2.684-.847 3.896-12.331-2.685zM125.461 46.352l1.222 3.795-12.018 3.868-1.221-3.795zM111.463 27.07l2.959 2.672-8.477 9.39-2.959-2.671z"/><g><path fill="#282D33" d="m94.486 89.054-1.66-3.625c8.743-4.007 14.393-12.83 14.393-22.479 0-13.613-11.025-24.689-24.576-24.689-7.85 0-15.042 3.637-19.736 9.977l-3.204-2.372c5.373-7.259 13.948-11.592 22.94-11.592 15.75 0 28.563 12.864 28.563 28.675-.001 11.202-6.562 21.45-16.72 26.105z"/></g><g><path fill="#282D33" d="M94.466 110.599H18.497C8.297 110.599 0 102.268 0 92.026c0-8.853 6.187-16.372 14.651-18.163.79-15.372 13.498-27.636 29.005-27.636 13.713 0 25.557 9.76 28.391 23.031a20.04 20.04 0 0 1 3.376-.292c11.263 0 20.426 9.2 20.426 20.508 0 .154-.002.309-.006.466 4.646 1.07 8.047 5.207 8.049 10.187 0 5.433-4.141 9.911-9.42 10.424l-.006.048zm-3.214-4.161 1.667.145c.181.016.36.03.542.03 3.554 0 6.445-2.909 6.445-6.485-.002-3.522-2.745-6.363-6.246-6.468l-2.174-.064.254-2.159c.082-.705.122-1.347.122-1.962 0-9.109-7.374-16.521-16.438-16.521-1.462 0-2.955.211-4.439.628l-2.205.618-.31-2.269C66.78 59.55 56.112 50.214 43.657 50.214c-13.817 0-25.058 11.29-25.058 25.167l.005 1.961-1.767.202c-7.326.838-12.85 7.064-12.85 14.482 0 8.042 6.509 14.586 14.51 14.586h72.709l.046-.174z"/></g><g><path fill="#282D33" d="m27.898 76.656-3.987-.014c.042-11.621 9.494-21.077 21.071-21.077v3.987c-9.386.001-17.05 7.674-17.084 17.104z"/></g></svg>
            <p class="capitalize">Feels like: {{ cityForecastData.main.feels_like }} &degC | {{ cityForecastData.weather[0].description }}</p>
            <p class="text-sm">Humidity: {{ cityForecastData.main.humidity }}%</p>
            <p class="text-sm">Visibility: {{ cityForecastData.visibility }}</p>
            <hr class="mt-4">
            <p class="mt-4 font-bold text-lg text-gray-600">
                Nearby Places:
            </p>
            <div>
                <ul>
                    <li class="bg-gray-100" v-for="place in cityNearbyPlaces">
                        <div class="my-2 p-2 border-y border-inherit">
                            <p class="text-sm">Name: <span class="font-bold">{{ place.name }}</span></p>
                            <p class="text-sm">Address: {{ place.location.address }}</p>
                            <!-- <div class="pa-4" v-for="item in place.related_places.children">
                                <img class="mb-4" :src="item.categories[0].icon.prefix + '32.png'" />
                                {{ item.name }} -->
                            <!-- </div> -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </Modal>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="my-8 ">
                <h1 class="text-xl font-bold">Japan Travel Guide</h1>
            </div>
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">
                        <a v-for="city in cities" @click="showInfoModal(city.name)"
                            class="cursor-pointer flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div class="pt-3 sm:pt-5">
                                <h2 class="mb-4 text-xl font-semibold text-black dark:text-white">{{ city.name }}</h2>
                                <img class="mb-4" :src="city.image_link" />
                                <p class="mt-4 text-sm/relaxed">
                                    {{ city.description }}
                                </p>
                            </div>
                        </a>
                      
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
