---
title: Support Vector Machines
---

Support Vector Machines
Optimization Objective

Alternative view of logistic regression

Large margin classifier in presence of outliers has very poor performance.

If the data is not linearly separable and the svm will perform poor if C is very large.

C perform a similar role as $$ \frac{1}{\lambda}$$

How the optimization problem results in a large margin classifier?

The math behind large margin classifier

Kernel Function (Gaussian Kernels)

Kernels and Similarity
$$ f_1 = similarity(x,l^{(1)}) = \exp(- \frac{||x-l^{(1)}||^2}{2\sigma^2})$$

* How do we choose landmarks?
* What other similarities functions can we use?

Choose Landmarks:

* Given $$ (x^{(1)},y^{(1)}), (x^{(2)},y^{(2)}), ... , (x^{(m)},y^{(m)})$$
* choose $$ (l^{(1)}=x^{(1)}), (l^{(2)} = x^{(2)}), ... , (l^{(m)}=x^{(m)})$$
