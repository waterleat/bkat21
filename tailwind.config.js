module.exports = {
	// darkMode: 'media',
	purge: {
		preserveHtmlElements: false,
		content: [
			"./*.php",
			"./inc/**/*.php",
			"./page-templates/**/*.php",
			"./views/**/*.php",
			"./assets/src/**/*.js",
		],
	},
	theme: {
		fontFamily: {
			body: ["Lucida Sans Unicode", "Lucida Grande", "Garuda", "sans-serif"],
			display: ["Prompt", "sans-serif"],
		},
		screens: {
			xs: "512px",

			sm: "600px",
			md: "768px",
			lg: "1024px",
			xl: "1280px",
		},
		extend: {
			colors: {
				rblue: "#00e",
				redFF: "#f00",
				grey055: "rgba(55,55,55,1)",
				grey119: "rgb(119,119,119)",
				grey222: "rgb(222,222,222)",
				redish: "rgb(167,22,22)",
				ltblue: "#3cabce",
				blueish: "rgb(67,69,139)",
				bluetwo: "rgb(160,162,218)",
				dkblue: "rgb(29,27,93)",
				orange600: "#dd6b20",
				orange700: "#c05621",
			},
			spacing: {
				"80": "20rem",
				"100": "25rem",
				"128": "32rem",
				"160": "40rem",
				"256": "64rem",
			},
		},
	},
	variants: {},
	plugins: [],
};
