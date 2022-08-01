# [Тестовое задание](TASK.md) для [Mono](https://monodigital.ru/)

### Установка на Ubuntu server:

Обновление системы и установка git+curl:
```
apt update -y && apt upgrade -y && apt install git curl -y
```

Установка docker:
```
{curl https://get.docker.com/ | sh} && systemctl enable docker.service
```

Установка docker-compose:
```
sudo curl -L https://github.com/docker/compose/releases/download/v2.9.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose && sudo chmod +x /usr/local/bin/docker-compose
```

Клонирование проекта:
```
git clone https://github.com/Dandead/parking-manager.git ; cd parking-manager
