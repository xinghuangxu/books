---
title: Unsupervised Learning
---

#Clustering

##Unsupervised Learning: Introduction
Differences between Supervised and Unsupervised Learnings:

* Supervised learning has labels
* Unsupervised learning has no labels (Clustering algorithms, Pattern discovery)

Applications of clustering:

* Market segmentation
* Social Network Analysis
* Organize Computing Clusters
* Astronomical Data analysis

##K-means Algorithm
An algorithm automatically cluster similar items together.

Input:

- K (number of clusters)
- Training set {$  x^1 , x^2 , x^3 , ... , x^m $}, where $x^{(i)} \in R^n$

###K-means algorithm:

* Randomly initialize K cluster centroids $ \mu_1, \mu_2,...,\mu_K \in R^n $
* Repeat:

~~~
for i = 1 to m
    c(i) := index (from 1 to K) of cluster centroid closest to x(i)
for k = 1 to K
    mu(k) := average(mean) of points assigned to cluster k
~~~

Notes: $c^i = \min\_k || x^i - \mu_k|| $ (Apart from euclidean distance, other similarities distances can also be used.)  
$\mu_2 = \frac{1}{4} [x^1 + x^5+x^6+x^{10}] \in R^n $ <br/>
Clusters with no points assign to it are usually eliminated.

###k-means for non-separated clusters:
* very often data sets may not have well separated clusters
* ![k-means](chapters/10/1.PNG){: .img-responsive }
* Can design t-shirts which fits three different group of people

---

##Optimization Objective
k-means also has an optimization objective that it tries to minimize.
Knowing the optimization objective will help us debug k-means and in the future help us improve k-means.  

###K-means optimization objective:  
$ c^i$ = index of cluster (1,2,..,K) to which example $x^i$ is currently assigned.  
$ \mu_k $= cluster centroid k $(\mu_k \in R^n) $  
$ \mu_{c^i} $ = cluster centroid of cluster to which example $x^i$ has been assigned  
Optimization Objective:  
$$ J(c^1,...,c^m,\mu_1,...,\mu_K) = \frac{1}{m} \sum_{x=1}^m ||x^i-\mu_{c^i}||^2 $$  
$$ \min_{c^1,...,c^m,\mu_1,...,\mu_K} J(c^1,...,c^m,\mu_1,...,\mu_K) $$  

Back to the k-means algorithm:

~~~
for i = 1 to m
    c(i) := index (from 1 to K) of cluster centroid closest to x(i)
~~~  
* Cluster assignment steps: tries to minimize J() by changing $c^1,...,c^m$ while keeping $ \mu_1,...,\mu_K $ fixed

~~~
for k = 1 to K
    mu(k) := average(mean) of points assigned to cluster k
~~~
* Move centroid steps: tries to minimize J() by changing $ \mu_1,...,\mu_K $

##Random Initialization
Help k-means to avoid local optimal

###Random Initialization (Recommended Way)
* Should have K < m 
* Randomly pick K training examples
* Set $\mu_1,...,\mu_K $ equal to these K examples.

Depending on the initialization, k-means can get stuck at different local optimal  
![k-means](chapters/10/2.PNG){: .img-responsive }

##Choosing the number of clusters
Choose that by hand, there is no automatic ways to do it.

###Choosing the value of K (Elbow method)
* Run K means with 1,2, ... clusters and plot their Cost function J
* Its worth a shot but don't have high expectation on that.
![Elbow Method](chapters/10/3.PNG){: .img-responsive }
* Sometimes, you're running K-means to get clusters to use for some later/downstream purpose.
Evaluate K-means based on a metric for how well it performs for that later purpose.

##Dimensionality Reduction

###Motivation 1: Data Compression
![Data Compression](chapters/10/4.PNG){: .img-responsive }

###Motivation II: Data Visualization
* If you have 50 features it's really hard to plot all the features
* Come up with a different feature representation with only two features
* After features reduction it's up to us to interpret the meaning of the new combined features.

### Principal Component Analysis (PCA) Problem Formulation
* PCA tries to find a surface to project data points to minimize the projection Errors.
![PCA](chapters/10/5.PNG){: .img-responsive }

### PCA vs Linear Regression
* No special variable y in PCA to predict
* Different optimization objectives
![PCA](chapters/10/6.PNG){: .img-responsive }

### How to find the surface to project the data?

### Principal Component Analysis
* Data Preprocessing  
 Training set: $x^1,x^2,...x^m$  
 Preprocessing (feature scaling / mean normalization):  
   * $\mu_j = \frac{1}{m} \sum_{i=1}^m x_j^i $  
   * replace each $x_j^i$ with $x_j-\mu_j $
   * $ x_j^i := \frac{x_j^i - \mu_j}{s_j} $ where $s_j$ is the max-min value or standard deviation of feature j. 
* PCA algorithm
  * Reduce data from n-dimensions to k-dimentions
  * Computer "Covariance matrix":
    * $\Sigma = \frac{1}{m} \sum_{i=1}^n(x^i)(x^i)^T $
  * Computer "eigenvectors" of matrix $\Sigma$:
    * $[U,S,V] = svd(\Sigma) $
  * Ureduce = U(:,1:k);
  * z = Ureduce'*x;

### Reconstruction from Compressed Representation
*  $ z = U_{reduce}^{T} x $
* $ x_{approx} = U_{reduce} z $

### Choosing the number of principal components K
* Average squared project error: $ \frac{1}{m} \sum_{i=1}^m \|\| x^i - x_{approx}^i\|\|^2$
* total variance in the data: $ \frac{1}{m} \sum_{i=1}^m \|\| x^i\|\|^2$
* Typically, choose k to be smallest value so that (99% of variance is retained)  

$$\frac{\frac{1}{m} \sum_{i=1}^m \| x^i - x_{approx}^i\|^2}{\frac{1}{m} \sum_{i=1}^m \| x^i\|^2} \leq 0.01$$ 

### Simple way to calculate variance retain rate:
$$\frac{\frac{1}{m} \sum_{i=1}^m \| x^i - x_{approx}^i\|^2}{\frac{1}{m} \sum_{i=1}^m \| x^i\|^2} = 1 - \frac{\sum_{i=1}^k S_{ii}}{\sum_{i=1}^n S_{ii}}$$ 
where S is from $$[U,S,V] = svd(Sigma)$$

### Advise for applying PCA
* Speed up the learning time of a learning algorithm with PCA
  * Supervised learning speedup
  * Say $x^i \in R^{10,000}$
  * With very high dimensional features, SVM and Lienar Regression will run real slow.
* Extract inputs:
  * Unlabeled dataset: $x^1, x^2,...,x^m \in R^{10000} $
  * Use PCA to get: $ z^1,z^2,...,z^m \in R^{1000} $
* New training set:
  *  $(z^1,y^1),(z^2,y^2),...,(z^m,y^m)$
* Note: Mapping $ x^i -> z^i $ should be defined by running the PCA only on the training set. This mapping can be applied as well to the examples
$x_{cv}^i$ and $x_{test}^i$ in the cross validation and test sets.

### Application of PCA
* Compression
  * Reduce memeory/disk needed to store data
  * Speed up learning algorithm
* Visualization
  * k = 2 or k = 3

### Bad use of PCA: To prevent overfitting
Use $z^i$ instead of $x^i$ to reduce the number of features to k<n.
Thus, fewer features, less likely to overfit.

This might work OK, but isn't a good way to address overfitting. Use regularization instead.

$$ \min_{\theta} \frac{1}{2m} \sum_{i=1}^m(h_{\theta}(x^i) - y^i)^2 + \frac{\lambda}{2m} \sum_{j=1}^n \theta_j^2 $$

Because PCA throws away some features of x without looking at y. While the optimization of regularization still has y in it.

### Bad use of PCA 2:   
Design of ML system:

* Get training set.
* Run PCA to reduce x in dimension to get z
* Train logistic regression on {z,y}
* Test on test set: Map $x_{test}$ to $z_{test}$. Run $h_{\theta}(z)$ on $(z_{test},y_{test})$  

Bad idea! Befoere implementing PCA, first try running whatever you want to do with the original data x.
Only if that doesn't do what you want, then implement PCA and consider using z.

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
* ![Anomaly Detection](chapters/10/7.PNG){: .img-responsive }
* ![Algorithm evaluation](chapters/10/8.PNG){: .img-responsive }

### Options in Anomaly Detection
* What $\varepsilon$ to use?
* What features to include?

### Anomaly Detection vs.Supervised Learning
* Why use anomaly detection not Supervised learning such as Logistic Regression, SVM, Linear Regression?
* ![Anomaly Detection vs Supervised Learning](chapters/10/9.PNG){: .img-responsive }

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
* ![Multivariate Gaussian Distribution](chapters/10/10.PNG){: .img-responsive }
* ![Original Model vs Multivariate Gaussian](chapters/10/11.PNG){: .img-responsive }
* if Sigma is non-invertible make sure m>n and there is no redundant features.
