## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
"# api" 
"# api" 

## DeepSeek OCR Demo

This repository now includes a helper script for testing the [DeepSeek-OCR](https://huggingface.co/deepseek-ai/DeepSeek-OCR) model via the Hugging Face Inference API.

### Requirements

* Python 3.9+ with an up-to-date `pip` installation (see below if you need to
  upgrade).
* The Python dependencies listed in `requirements.txt`.
* A Hugging Face access token with permission to use the Inference API.

### Installation

1. Ensure `pip` is available and upgraded:

   ```bash
   python -m ensurepip --upgrade
   python -m pip install --upgrade pip
   ```

2. (Optional but recommended) Create a virtual environment to isolate
   dependencies:

   ```bash
   python -m venv .venv
   source .venv/bin/activate
   ```

3. Install the Python requirements:

   ```bash
   python -m pip install -r requirements.txt
   ```

### Usage

1. Save your Hugging Face token in the `HF_API_TOKEN` environment variable (or supply `--token` on the command line).
2. Run the demo script with the image you want to process:

   ```bash
   python scripts/deepseek_ocr_demo.py path/to/image.png
   ```

   The script prints the text returned by the model.

You can override the model identifier with `--model` if you need to target a different variant published on Hugging Face.
