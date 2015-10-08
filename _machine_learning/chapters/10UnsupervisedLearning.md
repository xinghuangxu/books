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

