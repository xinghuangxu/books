---
title: Large Scale Machine Learning
---
## Gradient Descent with Large Datasets

### How to make the gradient descent algorithm run faster
* Batch Gradient Descent (b = m)
* Stochastic Gradient Descent (b=1)
* Mini-Batch Gradient Descent (b=10)

### Stochastic Gradient Descent Convergence
* Converge?
  * What is the cost function? Cannot calculate J= $\sum$ f all the errors because it is not efficient.
  * ![cost function for stochastic gradient descent](chapters/13/1.PNG){: .img-responsive }
* How to pick the learning rate?
  * Slowly decrease $\alpha$ over time if we want $\theta$ to converge.

### Online Learning
* Continuous stream of data (Website)
* Use Stochastic Gradient Descent
* Adopt to user behavior over time

### Map-Reduce and Data Parallelism
* Map-Reduce with Batch Gradience descent:
  * ![Map-Reduce with Batch Gradience Descent](chapters/13/2.PNG){: .img-responsive }

## Application Example: Photo OCR

### Photo OCR Pipeline (Machine learning pipeline)
1. Test Detection
1. Character Segmentation
1. Character Classification
1. Spelling Correction

### Sliding Windows
1. Test Detection
1. Character Segmentation

### Getting Lots of Data and Artificial Data
* Generating data from scratch
* Synthesizing data by introducing distortions

### Discussion on getting more data
* Make sure you have a low bias classifier before expending the effort. (Plot learning curves)
* "How much work would it be to get 10x as much data as we currently have?"
  * Artificial data synthesis
  * Collect/label it yourself
  * "Crowd Source" (E.g. Amazon Mechanical Turk)

### Ceiling Analysis: What Part of the Pipeline to Work on Next?
* Where should you allocate resources?
* What part of the pipeline should you spend the most time trying to improve?


## Summary: Main topics
* Supervised Learning
  * Linear Regression, Logistic regression, neural networks, SVMs
* Unsupervised Learning
  * K-means, PCA, Anomaly Detection
* Special applications/special topics
  * Recommender Systems, Large scale machine learning.
* Advice on building a machine learning system
  * Bias/Variance, regularization; deciding what to work on next; evaluation of learning algorithms, learning curves, error analysis, ceiling analysis

