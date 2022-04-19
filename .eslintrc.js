module.exports = {
    "env": {
        "browser": true,
        "commonjs": true,
        "es6": true
    },
    "extends": [
        "eslint:recommended",
        "plugin:vue/essential",
        "airbnb"
    ],
    "globals": {
        "Atomics": "readonly",
        "SharedArrayBuffer": "readonly"
    },
    "parserOptions": {
        "ecmaVersion": 11
    },
    "plugins": [
        "vue"
    ],
    "rules": {
        "indent": [
            2,
            4
        ],
        "linebreak-style": "off",
        "no-empty-pattern": "off",
        "no-return-await": "off",
        "import/prefer-default-export": "off",
        "global-require": "off",
        "radix": "off",
    }
};
