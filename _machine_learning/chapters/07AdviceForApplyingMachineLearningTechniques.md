---
title: Advice for applying machine learning techniques
---
### Choosing the regularization parameter $\lambda$
* ![](chapters/7/1.PNG){: .img-responsive }
* ![](chapters/7/2.PNG){: .img-responsive }

### Learning Curves
* High Bias
* ![High Bias](chapters/7/3.PNG){: .img-responsive }
* High Variance
* ![High Variance](chapters/7/4.PNG){: .img-responsive }

### Deciding what to do next?
* Get more traning examples -> fixes high variance
* Try smaller sets of features -> fixes high variance
* Try getting additional features -> fixes high bias
* Try adding polynomial features -> fixes high bias
* Try decreasing $\lambda$ -> fixes high bias
* Try increasing $\lambda$ ->fixes high variance

### Neural networks and overfitting
* Small -> underfitting
* Large -> overfitting