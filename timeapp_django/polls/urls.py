from django.conf.urls import url

from . import views

app_name='polls'
urlpatterns = [
	url(r'^$', views.index, name='index'),
	url(r'^(?P<idPregunta>[0-9]+)/$', views.detalls, name='detalls'),
	url(r'^(?P<idPregunta>[0-9]+)/resultats/$', views.resultats, name='resultats'),
	url(r'^(?P<idPregunta>[0-9]+)/votar/$', views.votar, name='votar'),
]