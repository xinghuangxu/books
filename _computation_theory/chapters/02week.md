---
title: Week 2
---

Regular Expressions
Definitions Equivalence to Finite Automata

Convert any regular expressions into automatons.

## Regular Expression
* **Regular expressions** describe languages by an algebra.
* They describe exactly the regular languages.
* If E is a regular expression, then L(E) is the language it defines.
* We will describe RE's and their languages recursively.

## RE Operations
* Union
* Concatenation
* kleene star

## RE Definition
1. If E1 and E2 are regular expressions, then E1+E2 is a regular expression, and L(E1+E2) = L(E1)$\cup$ L(E2)
1. E1E2 is a regular expression and L(E1E2) = L(E1)L(E2)
1. If E is a RE, then $ E^* $ is a RE, and $L(E^\*)$ = $(L(E))^*$

## Language Classes (Regular Language)
1. Decision Properties
1. Closure properties

## Closure properties
* Union
* Cancatenation
* Star

## Representation of Languages
* Can be formal or informal
* Formal: RE/RA
* A logical or prose statement about its strings:{0^n|n is a nonngegative integer}

## Decision Properties
* A decision property for a class of languages is an algorithm that takes a formal description of a language and tells whether or not some property holds.
* Does the protocol terminate? = Is the languages finite? 
* Can the protocol fail? = Is the language nonempty?
* We might want a "smallest" representation for a language, a minimum-state DFA or a shortest RE.
* If you can't decide 'Are these two languages the same?"

## Representation
* DFA
* NFA
* $\epsilon$NFA
* RE

## The Emptiness Problem
* Given a regular language, does the language contain any string at all?
* Assume representation is **DFA**.
* Compute the set of states reachable from the start state.
* If at least one final state is reachable, then yes, else no.


## The Infiniteness Problem
* Key idea: If the DFA has n states, and the language contains any string of length n or more, then the language is infinite.
* there are at least n+1 states along the path with a string length of n

## Completion of Infiniteness algorithm
* Test for membership all strings of length n and 2n-1 (n is the # of states)
* A terrible algorithm.
* Better: find cycles between the start and final state.

## Finding Cycles
1. Eliminate states not reachable from the start state.
1. Eliminate states that do not reach a final state.
1. Test if the remaining transition graph has any cycles.

## Pumping Lemma
For every regular language L
   There is an integer n (number of states of DFA for L), such that
      For every string w in L of length > n
         We can write w = xyz such that:

1. $\|xy\| < n$.
1. $\|y\| > 0$.
1. For all i > 0, $xy^iz$ is in L.

## Decision Property: Equivalence
* Given regular languages L and M, is L = M?
* Algorithm involves constructing the product DFA  from DFA's for L and M.
* Let these DFA's have sets of states Q and R, respectively.
* Product DFA has set of states $Q \times R$.
  * pairs $[q, r]$ with q in Q, r in R.


## Product DFA
* Start state =$ [q_0, r_0] $(the start states of the DFA's for L, M).
* Transitions: $$ \delta([q,r], a) = [\delta_L(q,a), \delta_M(r,a)]$$
  * $\delta_L$, $\delta_M$ are the transition functions for the DFA's of L, M.
  * That is, we simulate the two DFA's in the two state components of the product DFA.

## Equivalence Algorithm
* Make the final states of the product DFA be those states $[q, r]$ such that exactly one of q and r is a final state of its own DFA.
* Thus, the product accepts w iff w is in exactly one of L and M.
* L = M if and only if the product automaton's language is empty.

## Decision Property: Containment
* Given regular languages L and M, is $ L \subseteq M$?
* Algorithm also uses the product automaton.
* Define final state as q is final; r is not
* $ L \subseteq M$ iff the product DFA is empty (final states are unreachable)

## The Minimum-State DFA for a Regular Language
* In principle, since we can test for equivalence of DFA's we can, given a DFA A  find the DFA with the fewest states accepting L(A).
* Test all smaller DFA's for equivalence with A.
* But that's a terrible algorithm.

## Efficient DFA State Minimization
* Construct a table with all pairs of states.
* If you find a string that distinguishes two states (takes exactly one to an accepting state), mark that pair.
* Algorithm is a recursion on the length of the shortest distinguishing string.

## Closure Properties of Regular languages
1. Union
1. Intersection
1. Difference
1. Concatenation
1. Kleene Closure
1. Reversal
1. Homomorphism
1. Inverse Homomorphism
