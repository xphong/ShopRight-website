<?php

// Recipe Class: used to create recipe objects
class Recipe {

    private $id, $recipe_name, $type, $ingredients, $servings, $calories, $prep_time, $instructions, $image;

    public function __construct($recipe_name, $type, $ingredients, $servings, $calories, $prep_time, $instructions, $image) {
        $this->recipe_name = $recipe_name;
        $this->type = $type;
        $this->ingredients = $ingredients;
        $this->servings = $servings;
        $this->calories = $calories;
        $this->prep_time = $prep_time;
        $this->instructions = $instructions;
        $this->image = $image;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getRecipeName() {
        return $this->recipe_name;
    }

    public function setRecipeName($value) {
        $this->recipe_name = $value;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($value) {
        $this->type = $value;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function setIngredients($value) {
        $this->ingredients = $value;
    }

    public function getServings() {
        return $this->servings;
    }

    public function setServings($value) {
        $this->servings = $value;
    }

    public function getCalories() {
        return $this->calories;
    }

    public function setCalories($value) {
        $this->calories = $value;
    }

    public function getPrepTime() {
        return $this->prep_time;
    }

    public function setPrepTime($value) {
        $this->prep_time = $value;
    }

    public function getInstructions() {
        return $this->instructions;
    }

    public function setInstructions($value) {
        $this->instructions = $value;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($value) {
        $this->image = $value;
    }

}

?>
