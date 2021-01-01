module.exports = {
	purge: [
		'./*.php',
		'./inc/**/*.php',
		'./membership/**/*.php',
		'./page-templates/**/*.php',
		'./views/**/*.php',
		'./assets/src/**/*.scss',
		'./assets/src/**/*.js'
	],
	theme: {
		fontFamily: {
			body: [ 'Lucida Sans Unicode', 'Lucida Grande', 'Garuda', 'sans-serif' ]
		},
		screens: {
			ys: '340px',
			xs: '512px',

			sm: '640px',
			md: '768px',
			lg: '1024px',
			xl: '1280px',

			yl: '1680px',
			zl: '1980px'
		},
		extend: {
			colors: {
				rblue: '#00e',
				redFF: '#f00',
				grey055: 'rgba(55,55,55,1)',
				grey127: 'rgb(127,127,127)',
				grey222: 'rgb(222,222,222)',
				redish: 'rgb(167,22,22)',
				ltblue: '#3cabce',
				blueish: 'rgb(67,69,139)',
				dkblue: 'rgb(29,27,93);'
			},
			spacing: {
				'80': '20rem',
				'128': '32rem',
				'160': '40rem',
				'256': '64rem'
			}
		}
	},
	variants: {},
	plugins: []
}
