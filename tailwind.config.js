/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        fontFamily: {
            poppins: ["Poppins", "system-ui"],
            surat: ["PT Serif", "Serif"],
        },
        colors: {
            blue: {
                lightest: "#C4CFFF",
                lighter: "#7D94FF",
                light: "#5271FF",
                plain: "#0060A6",
            },
            red: {
                light: "#FF5959",
                plain: "#FF1F1F",
            },
            yellow: {
                light: "#F39C12",
                plain: "#DB8D10",
            },
            green: {
                light: "#63BC66",
                plain: "#429340",
            },
            orange: {
                light: "#FF8B49",
                plain: "#FF701F",
            },
            pink: {
                light: "#FF669C",
                plain: "#FF327B",
            },
        },
        backgroundImage: {
            GKT: "url('/public/images/GKT.jpeg')",
        },
    },
    plugins: [
        require("daisyui"),
        require("flowbite/plugin"),
        "prettier-plugin-tailwindcss",
    ],
    daisyui: {
        themes: false, // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
        darkTheme: "light", // name of one of the included themes for dark mode
        base: true, // applies background color and foreground color for root element by default
        styled: true, // include daisyUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
        logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
        themeRoot: ":root", // The element that receives theme color CSS variables
    },
};

