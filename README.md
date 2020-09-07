Minions Battle is a browser game, a battle simulator between two characters: the good minion TIM and the bad minion THE EVIL. I made this project using PHP, HTML, CSS and Bootstrap. This was the final project for the "Introduction to Web Development" Workshop held by the 3DPUB summer school. Here is the project description:
"Once upon a time there was a great minion, called TIM, with some strengths and weaknesses, as all minions have.<br>
After battling all kinds of evils for more than a hundred years, TIM now has the following stats:<br>
-Health: 70 - 100 <br>
-Strength: 70 - 80 <br>
-Defense: 45 – 55 <br>
-Speed: 40 – 50 <br>
-Luck: 10% - 30% (0% means no luck, 100% lucky all the time) Also, he possesses 2 skills: <br>
-Banana strike: Strike twice while it’s his turn to attack; there’s a 10% chance he’ll use this skill every time he attacks <br>
-Umbrella Shield: Takes only half of the usual damage when an enemy attacks; there’s a 20% change he’ll use this skill every time he defends <br>
GAMEPLAY <br>
As TIM walks, he encounters an evil with the following properties:<br>
-Health: 60 - 90<br>
-Strength: 60 - 90<br>
-Defense: 40 – 60<br>
-Speed: 40 – 60<br>
-Luck: 25% - 40% <br>
You’ll have to simulate a battle between TIM and an evil. either at the command line or using a web browser. On every battle, TIM and the evil must be initialized with random properties, within their ranges.<br>
The first attack is done by the minion with the higher speed. If both minions have the same speed, than the attack is carried on by the minion with the highest luck. After an attack, the minions switch roles: the attacker now defends and the defender now attacks.<br>
The damage done by the attacker is calculated with the following formula:
Damage = Attacker strength – Defender defense
<br>
The damage is subtracted from the defender’s health. An attacker can miss their hit and do no damage if the defender gets lucky that turn.
TIM’ skills occur randomly, based on their chances, so take them into account on each turn.<br>
GAME OVER <br>
The game ends when one of the minions remains without health or the number of turns reaches 20. The application must output the results each turn: what happened, which skills were used (if any), the damage done, defender’s health left.
If we have a winner before the maximum number of rounds is reached, he must be declared." <br>
RULES<br>
The code has to be written in PHP without any frameworks. The code also has to be decoupled, code reusable and scalable.<br>
BONUS FEATURES <br>
-A database in which I can save a battle history. I made that using MySQL. <br>
-A visual interface

Here are some screenshots:
![1](https://user-images.githubusercontent.com/64609288/92401942-6482a400-f137-11ea-810e-9945166fbf7b.png)
![2](https://user-images.githubusercontent.com/64609288/92401951-664c6780-f137-11ea-8711-ba5992eeef1d.png)
![3](https://user-images.githubusercontent.com/64609288/92401953-68162b00-f137-11ea-8002-21d21123dbb7.png)

