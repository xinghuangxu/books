---
title: Anomaly Detection
---

## Anomaly Detection
* Density estimation  
 Traning set: $x^1, x^2,...,x^m \in R^{n} $
 $$ p(x) = p(x_1;\mu_1,\sigma_1^2)p(x_2;\mu_2,\sigma_2^2)...p(x_n;\mu_n,\sigma_n^2) = \prod_{j=1}^n p(x_j;\mu_j,\sigma_j^2)$$
 
### Anomaly Detection Algorithm
1. Choose features $x^i$ that you think might be indicative of anomalous exampples.
1. Fit parameters $\mu_1,...\mu_n,\sigma_1,...\sigma_n$  
 $\mu_j = \frac{1}{m} \sum_{i=1}^m x_j^i$  
 $\sigma_j^2 = \frac{1}{m} \sum_{i=1}^m(x_j^i - \mu_j)^2$
1. Given new example x, compute p(x) with normal distribution function:
 $$ p(x) = \prod_{j=1}^n p(x_j;\mu_j,\sigma_j^2) = \prod_{j=1}^n \frac{1} {\sqrt{2\pi}\sigma_j} \exp(-\frac{(x_j-\mu_j)^2}{2 \sigma_j^2})$$  
 anomaly if p(x) < $\varepsilon$

### Developing and Evaluating and Anomaly Detection System
* **The importance of real-number evaluation**  
 When developing a learning algorithm(choosing features, etc.),
 making decisions is much easier if we have a way of evaluating our learning algorithm.
* Assume we have some labeled data, of anomalous and non-anomalous examples. (y = 0 if normal, y = 1 if anomalous).
* Traning set:  $x^1, x^2,...,x^m \in R^{n} $ (Assume normal examples/ not anomalous)
* Cross validation set: (x_cv,y_cv)
* Test set: (x_test,y_test)
* ![Anomaly Detection](chapters/11/7.PNG){: .img-responsive }
* ![Algorithm evaluation](chapters/11/8.PNG){: .img-responsive }

### Options in Anomaly Detection
* What $\varepsilon$ to use?
* What features to include?

### Anomaly Detection vs.Supervised Learning
* Why use anomaly detection not Supervised learning such as Logistic Regression, SVM, Linear Regression?
* ![Anomaly Detection vs Supervised Learning](chapters/11/9.PNG){: .img-responsive }

### Anomaly Detection: What features to use?
* Non-gaussian features? How to model? Make transformation to make the data more gaussian. (For example take a log(x), x2 = log(x2+1))
* Can also apply different transformations to differnet features.

### Anomaly Detection: Error analysis for anomaly detection
* Want p(x) large for normal examples x  
 p(x) small for anomalous examples x.
* Most common problem:
 p(x) is comparable for normal and anomalous examples
* Choose features that might take on unusually large or small values in the event of an anomaly
 * Combine features to create good features: x = CPU load / network traffic.

### Anomaly Detection Extension: Multivariate Gaussian Distribution
* Motivating example: Monitoring machines in a data center
* ![Multivariate Gaussian Distribution](chapters/11/10.PNG){: .img-responsive }
* ![Original Model vs Multivariate Gaussian](chapters/11/11.PNG){: .img-responsive }
* if Sigma is non-invertible make sure m>n and there is no redundant features.
