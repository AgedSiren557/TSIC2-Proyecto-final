# TSIC2-Proyecto-final
Proyecto final de la materia de Temas selectos en ingeniería en computación 2, utilizando kubernets

### Paso 1

Configurar cluster de kubernetes

https://help.clouding.io/hc/es/articles/4402401958034-C%C3%B3mo-instalar-un-cluster-de-Kubernetes-en-CentOS-8
https://upcloud.com/resources/tutorials/install-kubernetes-cluster-centos-8
https://docs.google.com/document/d/1diOW_whS-QC-MX8Wv7YMTbw20Z5_RF_gSFW2i4GliwQ/edit

### Paso 2
```console
cd definitions
```

## Comandos de ayuda

```console
kubectl exec --stdin --tty pod-name -- /bin/bash
```


```console
kubectl get svc
```

```console
kubectl delete svc/service_name
```

```console
kubectl get pv
```

```console
kubectl get deployments
```

```console
kubectl get pods
```

```console
kubectl describe pods pod-name
```

```console
kubectl logs pod-name
```

```console
kubectl logs pod-name --all-containers
```

acceder a la base de datos:

´´´
kubectl exec --stdin --tty <pod-name> -- /bin/bash
mysql -p
password
´´´
