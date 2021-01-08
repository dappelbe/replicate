# Replicate
*RE*dca*P* *L*og*IC* *A*nd *T*est g*E*nerator: Code to parse REDCap Logic expressions, either calculations or logic,
and generate an Abstract Syntax Tree (AST). This AST can then be pushed into a parser that will generate a series of tests,
in human-readable form, that can be used when undertaking validation.

[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/dwyl/esta/issues)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![REPLICATE Automated Tests](https://github.com/dappelbe/replicate/workflows/REPLICATE%20Automated%20Tests/badge.svg)


## 1. Requirements
* PHP 7.1 and above
* REDCap 8.8.2 as a minimum
* [Composer](https://getcomposer.org/)
* phpunit

## 2. Installation
This code is intended to be utilised as a library. You can install in one of two ways:
#### 2.1. Using Composer
If composer is not installed, please install as per the instructions at https://getcomposer.org/
```shell
composer require dappelbe/replicate
```
#### 2.2. Manually:  
If you are not using composer, clone this repository (as this will make it easier to keep up to date) 
into the directory where you are developing your code.
```shell
git clone https://github.com/dappelbe/replicate
```

## 3. Validation
Before using this library you **should** run the included unit tests to confirm that everything has been 
installed ok.
```shell
```

## 4. Usage Example

## 5. How to contribute
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change. Please make sure to update tests as appropriate. If you'd like to contribute, please fork the repository and make changes as you'd like. Pull requests are warmly welcome.

Steps to contribute:
1. Fork this repository (link to your repository)
2. Create your feature branch (git checkout -b feature/fooBar)
3. Commit your changes (git commit -am 'Add some fooBar')
4. Push to the branch (git push origin feature/fooBar)
5. Create a new Pull Request

## 6. Authors
Library created by Duncan Appelbe (Duncan.Appelbe@ndorms.ox.ac.uk)

## 7. Credits
Inspiration for this library has come from [Frank Wikström's](https://github.com/mossadal) 
[math-parser](https://github.com/mossadal/math-parser) package - Kudos!
## 8. License
This project is licensed under the MIT License - see [LICENSE](LICENSE) for details.

University of Oxford © Duncan Appelbe