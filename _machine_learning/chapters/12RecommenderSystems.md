---
title: Recommender Systems
---
## Problem Formulation
* What are the most important application that you want to improve/develop? Recommender System.
* Application: Netflix, Amazon
* Big ideas in machine learning: 
 * Some problems can automatically pick features for you!
 * Recommender system is one of those systems that can pick features for you.

### Motivating Example: Predicting movie ratings
![problem formation](chapters/12/1.PNG){: .img-responsive }

## Content based recommendations
* For each movies there is a set of features
 * Each feature has features like: (romance) (action) etc.
![content based recommendations problem formation](chapters/12/2.PNG){: .img-responsive }
![optimization objective](chapters/12/3.PNG){: .img-responsive }
* Note content based recommendations approach assumes that the features are available to us

## Collaborative Filtering (Automatic features learning)
* How do we learn the features? Assume that the value of features are unknown.
 * Movie one has no value on its features _romance_ _action_
 * we can learn the feature values from the movie viewers ratings
![optimization objective for collaborative filtering](chapters/12/4.PNG){: .img-responsive }

## Collaborative Filtering Algorithm
![optimization objective for collaborative filtering](chapters/12/5.PNG){: .img-responsive }

### Low Rank Matrix Factorization
* Find Related Movies? Distance $||x^i-x^j|| $ is small

### Mean Normalization
* Make the algorithms a little faster
![new user](chapters/12/6.PNG){: .img-responsive }
![new user with normalization](chapters/12/7.PNG){: .img-responsive }