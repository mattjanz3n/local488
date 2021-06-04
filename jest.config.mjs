import jestConfig from 'jest-config';

export default {
	testRegex: '/__tests__/.*\\.test\\.m?js$',
	transform: {
		'\\.mjs$': 'babel-jest',
	},
	moduleFileExtensions: [
		...jestConfig.defaults.moduleFileExtensions,
		'mjs',
	],
	clearMocks: true,
};
