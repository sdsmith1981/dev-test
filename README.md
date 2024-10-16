# Shopblocks PHP Developer Test: Pet-é-dex 

Welcome to the **Shopblocks PHP Developer Test: Pet-é-dex**! This project evaluates your skills in working with APIs, building user interfaces, and implementing core functionality using PHP and Laravel. While design skills are a bonus, we will focus mainly on usability, performance, and security.

## Introduction

Your task is to create a **Pet-é-dex** a web-based encyclopedia for either dogs or cats. You can choose between:
- [The Cat API](https://thecatapi.com/)
- [The Dog API](https://thedogapi.com/)

This project will provide users with the ability to search for and display information about specific breeds, based on the selected API.

## Project Requirements

To complete the project, make sure you have the following installed:
- **Composer**
- **Git**

The front-end of the application **must be built using Bootstrap** to ensure a responsive and clean design. Feel free to add custom styling as needed.

### Additional Requirements

- You will be provided with a skeleton Laravel application.
- You must fork this repository to your own public GitHub account to complete the task.
- We recommend spending no more than two hours on this challenge.

## Task Requirements

You are required to build a **Pokédex-style web app** (Pet-é-dex) that allows users to search for and display information about pet breeds, using your chosen API.

- Api keys will be provided in the example .env file within the laravel application.
- The API is rate-limited, so be cautious when making requests.
- You must implement a search functionality to filter breeds by name.

### Key Features:

1. **Main Pet-é-dex Page**:
    - Display a full list of pets fetched from the API.
    - Provide a search form to allow users to filter the list by pet breed name.

2. **Pet Overview Page**:
    - When a pet breed is clicked from the main page, redirect to a detailed overview page.
    - Display pet information such as image, breed name, temperament, life expectancy, and other relevant data.

3. **Navigation**:
    - Include a navigation link to go back to the main page from the Pet Overview page.

## User Stories

| As an       | I want to                                   | So that I can                                        |
|-------------|---------------------------------------------|-----------------------------------------------------|
| End User    | Search for a specific pet breed             | Confirm information such as temperament, life expectancy, etc. about the breed |

## Acceptance Criteria

| GIVEN                  | WHEN                                     | THEN                                                                |
|------------------------|------------------------------------------|---------------------------------------------------------------------|
| I am on the main Pet-é-dex page | The page loads                            | I can see a full list of available pets                             |
| ^                      | ^                                        | I can see a search form to filter the list by pet breed              |
| ^                      | I enter a breed name and search          | I can see a filtered list of matching results                       |
| ^                      | I click on a pet breed in the list       | I am redirected to the pet's overview page                          |
| I am on the Pet Overview page | The page loads                            | I can see an image, name, breed, and other details returned from the API |
| ^                      | ^                                        | I can see a link back to the main page                              |

## API Information 

The api documentation can be found here: https://documenter.getpostman.com/view/5578104/RWgqUxxh. The api is the same for
both cats and dogs. So the only difference if the url being either thecatapi.com or thedogapi.com.

## Submission

Once you’ve completed the test:
- Ensure you have forked the repository.
- No pull/merge request is required.
- Provide a link to your forked repository for review.

## Notes

- We’re more interested in **how you approach the task** rather than expecting a fully polished product. Focus on functionality above styling but the front-end should be easy to use and responsive.
- Consider **performance and security** when making API requests.

## Copyright

All trademarks are the property of their respective owners.
