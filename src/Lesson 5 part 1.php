<?php
/**
 * В сервисе Basket методе getProductsInfo() мы применяем фабричный метод (далее ФМ) getProductRepository() для
 * получения объекта класса Model\Repository\Product. Сам метод getProductsInfo() мог бы создавать объект
 * Model\Repository\Product, но это нарушает Single Responsibility, поэтому getProductsInfo() делегирует создание на ФМ,
 * и не знает какой объект вернется, и
 * вызывает у него метод search(). Эта реализация паттерна мне кажется недоделанной, ибо должен быть создан
 * интерфейс, например, IProduct с описанием метода search(), а Model\Repository\Product имплементировать этот
 * интерфейс. Тогда мы можем быть уверены, что возвращаемый объект в getProductsInfo() будет реализовывать метод
 * search()
 */