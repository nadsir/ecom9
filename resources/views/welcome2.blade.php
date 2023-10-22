<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
        @livewireStyles
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.css">
    </head>
    <body class="antialiased">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                Column
            </div>
            <div class="col">
                Column
            </div>
            <div class="col">
                <x-alert/>
            </div>
        </div>
    </div>
    <div class="box green" ></div>
    <div id="app">
        <a v-bind:href="href"> ssss </a>
        <ul>
            <li v-for="(item,index) in items">
                @{{ message }} ---- @{{ index }}--------@{{ item }}

            </li>

        </ul>

        <div v-for="item in items" :key="item.id">
             content
        </div>
        <button @click="warn('Form cannot be submitted yet.', $event)">
            Submit
        </button>
        <compomemt-a></component-a>

    </div>
    <livewire:test-example />
    @livewireScripts
    @vite('resources/js/app.js')
    <div class="scrollContainer">

        <div class="content">
            <h1>Smooth Scrolling: Yes</h1>
            <p>arcu, non mattis nunc. Pellentesque quis enim eget ex congue ornare quis eu dolor. Sed ac egestas dissim velit mi, at semper risussellus consequat libero sed auctor pulvinar. Du</p>
            <p>or sit amet. Nulla facilisi. Integer id placerat massa. Duis justo arcu, luctus sit amet pharetra a, pretium id ligula. Donec efficitur nunc vitae eros hendrerit feugiat. Phasellus consequat libero sed auctor pulvinar. Duis cursus libero at justo aliquet accumsan. Class aptent taciti sociosqu adauris, sagittis sagittis justo. Nam et semper felis, et malesuada erat.</p>
            <p>Donec et ultricies arcu, non mattis nunc. Pellentesque quis enim eget ex congue ornare quis eu dolor. Sed ac egestas dolor, vitae placerat elit. Ut luctus massa sit amet etra cumsan. Class aptent taciti sociosqu adauris, sagittis sagittis justo. Nam et semper feli quam facilisis congue. Donec mauris dolor, congue ac euismod eu, fs sagittis justo. Nam et semper felis, et malesuada erat.</p>
            <p>arcu, non mattis nunc. Pellentesque quis enim eget ex congue ornare quis eu dolor. Sed ac egestas dissim velit mi, at semper risussellus consequat libero sed auctor pulvinar. Du</p>
            <p>or sit amet. Nulla facilisi. Integer id placerat massa. Duis justo arcu, luctus sit amet pharetra cumsan. Class aptent taciti sociosqu adauris, sagittis sagittis justo. Nam et semper felis, et malesuada erat.</p>
            <p>ongue ornare quis eu dolor. Sed ac egestas dolor, vitae placerat elit. Ut luctus massa sit amet quam facilisis congue. Donec mauris dolor, congue ac euismod eu, fs sagittis justo. Nam et semper felis, et malesuada erat.</p>
        </div>


        <div class="clockWrapper">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #323232;
                        }

                        .cls-2 {
                            fill: none;
                            stroke: #f6c;
                            stroke-linejoin: round;
                            stroke-width: 8px;
                        }

                        .cls-3 {
                            fill: #a4a4a4;
                        }

                        .cls-4 {
                            fill: #ccc;
                        }
                    </style>
                </defs>
                <g id="bg">
                    <g id="Layer3_0_FILL" data-name="Layer3 0 FILL">
                        <path class="cls-1" d="M400,400V0H0V400Z"/>
                    </g>
                </g>
                <g id="face">
                    <g id="Layer2_0_FILL" data-name="Layer2 0 FILL">
                        <path d="M200,181.5a18.5,18.5,0,0,0,0,37,18.5,18.5,0,0,0,0-37Z"/>
                    </g>
                    <path id="Layer2_0_1_STROKES" data-name="Layer2 0 1 STROKES" class="cls-2" d="M388.5,200q0,78.11-55.2,133.3T200,388.5q-78.1,0-133.3-55.2T11.5,200q0-78.1,55.2-133.3T200,11.5q78.11,0,133.3,55.2T388.5,200Z"/>
                </g>
                <g id="smallHand">
                    <g id="smallHand_0_Layer0_0_FILL" data-name="smallHand 0 Layer0 0 FILL">
                        <path class="cls-3" d="M195,69V200h10V69l-5-10.25Z"/>
                    </g>
                </g>
                <g id="bigHand">
                    <g id="bigHand_0_Layer0_0_FILL" data-name="bigHand 0 Layer0 0 FILL">
                        <path class="cls-4" d="M195,44V200h10V44l-5-10.25Z"/>
                    </g>
                </g>
            </svg>

        </div>
        <div class="content">
            <h1>more text</h1>
            <p>arcu, non mattis nunc. Pellentesque quis enim eget ex congue ornare quis eu dolor. Sed ac egestas dissim velit mi, at semper risussellus consequat libero sed auctor pulvinar. Du</p>
            <p>or sit amet. Nulla facilisi. Integer id placerat massa. Duis justo arcu, luctus sit amet pharetra a, pretium id ligula. Donec efficitur nunc vitae eros hendrerit feugiat. Phasellus consequat libero sed auctor pulvinar. Duis cursus libero at justo aliquet accumsan. Class aptent taciti sociosqu adauris, sagittis sagittis justo. Nam et semper felis, et malesuada erat.</p>
            <p>Donec et ultricies arcu, non mattis nunc. Pellentesque quis enim eget ex congue ornare quis eu dolor. Sed ac egestas dolor, vitae placerat elit. Ut luctus massa sit amet etra cumsan. Class aptent taciti sociosqu adauris, sagittis sagittis justo. Nam et semper feli quam facilisis congue. Donec mauris dolor, congue ac euismod eu, fs sagittis justo. Nam et semper felis, et malesuada erat.</p>
            <p>arcu, non mattis nunc. Pellentesque quis enim eget ex congue ornare quis eu dolor. Sed ac egestas dissim velit mi, at semper risussellus consequat libero sed auctor pulvinar. Du</p>
            <p>or sit amet. Nulla facilisi. Integer id placerat massa. Duis justo arcu, luctus sit amet pharetra cumsan. Class aptent taciti sociosqu adauris, sagittis sagittis justo. Nam et semper felis, et malesuada erat.</p>
            <p>ongue ornare quis eu dolor. Sed ac egestas dolor, vitae placerat elit. Ut luctus massa sit amet quam facilisis congue. Donec mauris dolor, congue ac euismod eu, fs sagittis justo. Nam et semper felis, et malesuada erat.</p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>

    </body>
<script>
    attributeName='url'
</script>



</html>
