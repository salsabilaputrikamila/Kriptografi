# CaesarCipher

## Introduction
The Caesar cipher is one of the earliest known and simplest ciphers. It is a type of substitution cipher in which each letter in the plaintext is 'shifted' a certain number of places down the alphabet. For example, with a shift of 1, A would be replaced by B, B would become C, and so on. The method is named after Julius Caesar, who apparently used it to communicate with his general

**Example:**
This is a very simple encryption technique: it substitutes each letter with a different one based on a shift factor. For example, applying a shift factor of 3 to `apple` will turn it into `dssoh`. 


## PHP
The PHP application accepts plaintext with POST request and render user input. The user can specify, how many shifts should I apply. The values submitted in forms are accessed through the `$_POST` method. Then the end result is created based on 'number of shifts' and outputed in a text area.

**Styling:**
The Popular CSS framework called 'Bootstrap' is used for simple styling. 

## Logic
The logic behind the cipher uses the modulus operator to calculate results. Since there are only 26 alphabets in English so if it exceed the limit then Modular Reduction method is applied to keep the result at specified length.

Coming Soon for Some Other Platforms!
